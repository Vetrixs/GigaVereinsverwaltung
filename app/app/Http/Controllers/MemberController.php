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
    public function show(Member $member)
    {
        return $member;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return inertia("Member/Edit.vue", compact("member"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(MemberRequest $request, Member $member)
    {
        $member->update($request->validated());
        return redirect(route('member.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect(route('member.index'));
    }
}
