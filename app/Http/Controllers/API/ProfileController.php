<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware(['auth', 'permission:profile']);
    }

    public function index()
    {
          // fetch the user's data from auth
        return User::where('id', Auth::user()->id)->first();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //update the user
        if(auth()->user()->can('profile')){

            // find the user
            $user = User::findOrfail($id);

            // validate the data
            $this->validate($request, [
                'name'=>'required|string|max:64',
                'email'=>'required|string|email|max:64|unique:users,email,'.$user->id,
                'password'=>'sometimes|string|min:8',
                'photo'=>'nullable',
            ]);

            // update the photo
            if($request['photo']!=$user->photo){
                $name=time().'.'.explode('/', explode(':', substr($request->photo,0,strpos($request->photo, ';')))[1])[1];
                $publicPath=public_path('images/users/'.$name);
                \Image::make($request->photo)->save($publicPath);
                if((file_exists(public_path('images/users/'.$user->photo)))&&($user->photo!="profile.png")){
                    @unlink(public_path('images/users/'.$user->photo));
                }
                $request->merge(['photo'=>$name]);
            }
            else
            {
                $name = $user->photo;
            }

            // update the record
            $user->name = $request->name;
            $user->email = $request->email;
            if(isset($request->password) && $request->password != null)
            {
                $user->password=Hash::make($request->password);
            }
            $user->photo = $name;
            $user->save();

            return response()->json("Record updated successfully", 200);
        }else{
            return response()->json("Unauthorized", 401);
        }
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
