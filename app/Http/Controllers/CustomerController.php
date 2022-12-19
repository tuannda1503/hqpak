<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::get();

        return view('pages.customers.customer', compact('customers'));
    }

    public function store()
    {
        return view('pages.customers.customer-create');
    }

    public function create(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required',
            'phone' => 'required|max:10',
            'address' => 'required'
        ]);

        $customer = new Customer();
        $customer->email = $request->email;
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;

        $customer->save();
        return redirect()->route('customers.index');
    }

    public function show(Request $request)
    {
        $customer = Customer::find($request->id);

        return view('pages.customers.customer-detail', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'name' => 'required',
            'phone' => 'required|max:10',
            'address' => 'required'
        ]);

        $customer->email = $request->email;
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;

        $customer->save();
        return redirect()->route('customers.index');
    }
}
