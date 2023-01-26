<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\ParkingSpace;
use DateTime;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $freeParkingSpaces = ParkingSpace::getFreeSpaces();
        return inertia('Ticket/index', compact('freeParkingSpaces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'license_plate' => 'required'
        ]);

        $customer = Customer::firstOrCreate(
            ['license_plate' => $request->get('license_plate')],
            ['season_parker' => 0]
        );

        if($customer->parkingSpace){
            return redirect()->back() ;

        }
        if(!$customer->season_parker && ParkingSpace::getFreeSpaces() == 0){
            return redirect()->back() ;
        }

        $customer->parkingSpace()->create();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($license_plate)
    {
        $customer = Customer::where('license_plate', 'like', $license_plate)->first();

        if($customer && $customer->parkingSpace){
            if($customer->season_parker){
                $customer->invoices()->create([
                    'timestamp_in' => $customer->parkingSpace->created_at,
                    'timestamp_out' => (new DateTime())->format('Y-m-d H:i:s') ,
                ]);

            }
            $customer->parkingSpace->delete();
        }

        return response()->json(true);
    }

    public function getParkingStatus($license_plate){
        $customer = Customer::where('license_plate', 'like', $license_plate)->first();

        $data = [
            'open_ticket' => $customer?->parkingSpace ? 1 : 0,
            'pay' => !$customer?->season_parker
        ];
        return response()->json($data);
    }
}
