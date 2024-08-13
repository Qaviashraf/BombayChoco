<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return redirect()->back()->with('error','Invalid login details');
            
        }else{
            $user = User::where('email', $request['email'])->firstOrFail();
            
            if ($user) {
                return redirect('/my-account');
            }
        }
    }

    // Customer Register
    public function customerRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:64',
            'email' => 'required|string|email|max:64|unique:users',
            'password' => 'required|string|min:8',
        ]);
        
        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->photo='profile.png';
        $user->assignRole(4);
        $user->save();


        return redirect('/wishlist')->with('success','User Register Successfully');

    }

    // 
    public function updateAccount(Request $request)
    {
        $user = Auth::user();

        $user->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'address'=> $request->address,
        ]);

        return redirect()->back()->with('success','Record updated successfully');
    }

    public function updatePassword(Request $request)
    {
        // Validate the form data
        $request->validate([
            'password' => 'required|min:8', // Add any other validation rules you need
            'password_confirmation' => 'required|same:password',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Update the user's password
        $user->update([
            'password' => Hash::make($request->input('password')),
        ]);

        // You may add a success message or redirect the user to another page
        return redirect()->back()->with('success', 'Password updated successfully');
    }
}
