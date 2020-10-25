<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Company;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $companies = Company::all();

        return view('frontend.customer.index', compact('companies'));
    }

    public function joinCompany($id)
    {
        $company = Company::findBySlug($id);
        
        if(is_null($company)) return redirect()->back()->withErrors('msg', 'Company does not exist!');

        Customer::create([
            'user_id'       => auth()->user()->id,
            'company_id'    => $company->id,
        ]);

        return redirect()->back()->with('flash_success', 'Successfully joined company');
    }
}
