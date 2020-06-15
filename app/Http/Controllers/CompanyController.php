<?php

namespace App\Http\Controllers;
use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    //
    public function __construct(){
        $this->middleware(['auth','verified']);
    }
    
    public function index(){
        $companies = auth()->user()->companies()->orderBy('id','desc')->with('contacts')->paginate(1);
        return view ('companies.index',compact('companies'));
    }

    public function create(){
        $company = new Company();
        return view ('companies.create',compact('company'));
    }

    public function store(CompanyRequest $request){
        $request->user()->companies()->create($request->all());
        return redirect()->route('companies.index')->with('Company Added Successfully');
    }

    public function show(Company $company){
        return view ('companies.show',compact('company'));
    }

    public function edit(Company $company){
        return view ('companies.edit',compact('company'));
    }

    public function update(CompanyRequest $request,Company $company){
        $company->update($request->all());
        return redirect()->route('companies.index')->with('Company updated Successfully');

    }

    public function destroy(Company $company){
        $company->delete();
        return redirect()->route('companies.index')->with('message', "Company has been removed successfully");

    }
}
