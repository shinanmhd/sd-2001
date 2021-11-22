<?php

namespace App\Http\Controllers;

use App\Models\MembershipType;
use Illuminate\Http\Request;

class MembershipTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $membership_types = MembershipType::paginate(10);

        return response()->view('membership_type.index', compact('membership_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('membership_type.new-membership-type');
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
            'name'               => 'required|min:1',
            'signup_fee'         => 'required|numeric',
            'duration_in_months' => 'required|numeric',
            'discount_rate'      => 'required|numeric',
        ]);

        MembershipType::create([
            'name'               => $request->input('name'),
            'signup_fee'         => $request->input('signup_fee'),
            'duration_in_months' => $request->input('duration_in_months'),
            'discount_rate'      => $request->input('discount_rate'),
        ]);

        return redirect(route('membershipType.index'))->with('message', 'New Membership type Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $membership_type = MembershipType::findOrFail($id);

        return response()->view('membership_type.edit-membership-type', compact('membership_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'               => 'required|min:1',
            'signup_fee'         => 'required|numeric',
            'duration_in_months' => 'required|numeric',
            'discount_rate'      => 'required|numeric',
        ]);

        $membershipType = MembershipType::findOrFail($id);

        $membershipType->name               = $request->input('name');
        $membershipType->signup_fee         = $request->input('signup_fee');
        $membershipType->duration_in_months = $request->input('duration_in_months');
        $membershipType->discount_rate      = $request->input('discount_rate');
        $membershipType->save();

        return redirect(route('membershipType.index'))->with('message', 'Membership type Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
