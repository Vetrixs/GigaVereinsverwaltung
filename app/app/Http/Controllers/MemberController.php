<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Models\Address;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        return inertia("Member/Index.vue", compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $member = new Member([
            'name' => null,
            'phone_number' => null,
            'email_address' => null,
            'iban' => null,
            'birthday' => null,
            'is_employed' => false,
            'street' => null,
            'city' => null,
            'state' => null,
            'postal_code' => null
        ]);
        return inertia("Member/Create.vue", compact("member"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {

        $member = new Member($request->validated());
        $member->save();
        return redirect(route('member.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Member::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("Viewfile", compact("member"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $member = Member::find($id);

        $member->update([
            'name' => $request->input('name'),
            'phone_number' => $request->input('phone_number'),
            'email_address' => $request->input('email_address'),
            'iban' => $request->input('iban'),
            'birthday' => $request->input('birthday'),
            'is_employed' => $request->input('is_employed'),
            'street' => $request->input('street'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'postal_code' => $request->input('postal_code')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
