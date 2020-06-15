<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function edit(){
        return view('settings.profile',[
            'user' => auth()->user()
        ]);
    }
    public function update(ProfileUpdateRequest $request){
        //    dump($request->file('profile_picture'));
        //    dd($request->hasFile('profile_picture'));
 
       $profileData = $request->handleRequest();
       $request->user()->update($profileData);
       return back()->with('message','Profile has been Updated Successfully');
    }

}
