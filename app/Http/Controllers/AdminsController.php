<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Hash;
use App\Admin;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\User;
use Redirect;

class AdminsController extends Controller
{
   // show by default
    public function index()
    {
       return view("auth.login-adm");
    }
   // Show all users
    public function home(){
         $users =User::paginate(4);
          return view("Admins.Home")->with('users',$users);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    //Post login
    public function store(Request $request)
    {
        $email             =$request->input("email");
        $password          = $request->input("password");
        $validator         = Validator::make($request->all(), Admin::rules());
        if($validator->fails()){
         return $validator->errors()->all();
        }
        else{
            $credintials =['email'=>$email , 'password' =>$password];
        if(auth()->guard('admin')->attempt($credintials)){
        return redirect('/Admins/home');
        }
        else{
         return 'Invalid Login';
        }
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
          // show the view and pass the data to it
        $user = User::find($id);
        return view('Admins.edit-user')
            ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request ,$id)
    {
        $name              =$request->input("name");
        $email             =$request->input("email");
        $password          = $request->input("password");
        $hashedPass        = Hash::make($request->input("password"));
        $validator         = Validator::make($request->all(), Admin::updateUser());
        if($validator->fails()){
         return $validator->errors()->all();
        }
        else{
        $user=User::find($id);
        $user->name     = $name;
        $user->email    = $email;
        $user->password = $hashedPass;    
        $user->save();
        return redirect('Admins/home');
    
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('Admins/home');
    }

    // logout 
    public function logout(){
        auth()->guard('admin')->logout();
        return redirect('Admins');
    }

}

