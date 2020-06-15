<?php

namespace App\Http\Controllers;
use App\Company;
use App\Contact;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        $companies = Company::userCompanies();
        // \DB::enableQueryLog();
        $contacts = auth()->user()->contacts()->with('company')->latestFirst()->paginate(1);
        // dd(\DB::getQueryLog());
        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create()
    {
        $contact = new Contact();
        $companies = Company::userCompanies();

        return view('contacts.create', compact('companies', 'contact'));
    }

    public function store(ContactRequest $request)
    {
        $request->user()->contacts()->create($request->all());

        return redirect()->route('contacts.index')->with('message', "Contact has been added successfully");
    }

    public function edit(Contact $contact)
    {
        $companies = Company::userCompanies();

        return view('contacts.edit', compact('companies', 'contact'));
    }

    public function update(Contact $contact, ContactRequest $request)
    {
        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('message', "Contact has been updated successfully");
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('message', "Contact has been deleted successfully");
    }
    
    // public function index(){
       
    //     // $user = Auth::user();
    //     $companies = Company::userCompanies();
    //    // $contacts = Contact::orderBy('first_name','asc')->get();

    //      //Activating query Log
    //      //\DB::enableQueryLog();

    //    // this is how to use paginate class
    //    $contacts = auth()->user()->contacts()->orderBy('id', 'desc')->with('company')->where(function ($query) {
    //         if ($companyId = request('company_id')) {
    //             $query->where('company_id', $companyId);
    //         }

    //         if ($search = request('search')) {
    //             $query->where('first_name', 'LIKE', "%{$search}%");
    //             $query->orWhere('last_name', 'LIKE', "%{$search}%");
    //             $query->orWhere('email', 'LIKE', "%{$search}%");
    //             $query->orWhere('phone', 'LIKE', "%{$search}%");
    //             $query->orWhereHas('company',function($query) use ($search){
    //                 $query->where('name','LIKE',"%{$search}%");
    //             });
    //         }
    //     })->paginate(10);
    //     //dd(\DB::getQueryLog());

    //     return view('contacts.index',compact('contacts','companies'));
    // }

    // public function create(){
    //     $contact = new Contact();
        
    //     $companies = Company::userCompanies();
    //     return view('contacts.create',compact('companies','contact'));
    // }

    // public function store(ContactRequest $request){
    //     // This is for only this field
    //     //dd($request->only('first_name','last_name','phone','email','address','company_id'));
    //     // This is for except this field
    //     //dd($request->except('first_name','last_name','phone','email','address','company_id'));
        

    //     //dd($request->all());
    //     // Contact::create($request->all()+['user_id' => auth()->id()]);
    //     $request->user()->contacts()->create($request->all());
    //     return redirect()->route('contacts.index')->with('message','Contact has been added Successfully');

    // }

    // public function show(Contact $contact){
    //     // $contact = Contact::find($id);
    //     return view('contacts.show',compact('contact'));
    // }

    // public function edit(Contact $contact){
    //     // $contact = Contact::findOrFail($id);
    //     $companies = Company::userCompanies();
    //     return view('contacts.edit',compact('contact','companies'));
    // }

    // public function update(Contact $contact,ContactRequest $request){
    //     $request->validate([
    //         'first_name' => 'required',
    //         'last_name' => 'required',
    //         'email' => 'required|email',
    //         'phone' => 'required',
    //         'address' => 'required',
    //         'company_id' => 'required|exists:companies,id',
    //     ]);
    //     // $contact = Contact::findOrFail($id);
    //     $contact->update($request->all());
    //     return redirect()->route('contacts.index')->with('message','Contact has been updated Successfully');

    // }

    // public function destroy(Contact $contact){
    //     // $contact = Contact::findOrFail($id);
    //     $contact->delete();
    //     return redirect()->route('contacts.index')->with('message','Contact has been Deleted Successfully');
    // }


}
