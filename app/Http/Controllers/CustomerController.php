<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\MembershipType;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::paginate(10);

        return response()->view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): \Illuminate\Http\Response
    {
        $membershipTypes = MembershipType::all();

        return response()->view('customer.new-customer', compact('membershipTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name'   => 'required|min:4',
            'membership_type' => 'required',
            'date_of_birth'   => 'required|date'
        ]);

        Customer::create([
            'name'                        => $request->input('customer_name'),
            'date_of_birth'               => $request->input('date_of_birth'),
            'is_subscribed_to_newsletter' => $request->has('is_subscribed_to_newsletter') ? 1 : 0,
            'membership_type_id'          => $request->input('membership_type')
        ]);

        return redirect(route('customer.index'))->with('message', 'Customer Added!');
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
        $customer = Customer::findOrFail($id);
        $membershipTypes = MembershipType::all();

        return response()->view('customer.edit-customer', compact('customer', 'membershipTypes'));
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
            'customer_name'   => 'required|min:4',
            'membership_type' => 'required',
            'date_of_birth'   => 'required|date'
        ]);

        $customer = Customer::findOrFail($id);

        $customer->name                        = $request->input('customer_name');
        $customer->date_of_birth               = $request->input('date_of_birth');
        $customer->is_subscribed_to_newsletter = $request->has('is_subscribed_to_newsletter') ? 1 : 0;
        $customer->membership_type_id          = $request->input('membership_type');

        $customer->save();

        return redirect(route('customer.index'))->with('message', 'Customer Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Customer::findOrFail($id)->delete();
        return back();
    }
}
