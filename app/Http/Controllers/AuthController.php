<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    /**
     * Return the register view
     */
    public function show_register()
    {
       return view('auth.register');
    }
    /**
     * Return the login view
     */
    public function show_login()
    {
        return view('auth.login');
    }
    /**
     * creates and saves new user
     */
    public function register(Request $request)
    {
        $this->validate($request,[
           'name'    => 'required|min:3|max:191',
           'email'   => 'required|email|unique:users',
           'query'   => 'required|min:3|max:191',
           'password'=> 'required|min:6|max:10|confirmed'
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->query = $request->input('query');
        $user->user_type = "subscriber";
        $user->password = bcrypt($request->input('password'));
        $password_confirmation = $request->input('password_confirmation');
        $user->save();
        return redirect('/login_view')->with('success_message','Thank you for joining our store');
    }
    /**
     * logs the user in
     */
    public function login(Request $request)
    {
        $credentials = [
            'email'    => $request->input('email'),
            'password' => $request->input('password')
        ];

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            // get the user type
            $user = User::select('user_type')
                        ->where('email','=',$credentials['email'])
                        ->get();
            if($user[0]->user_type == "admin"){
                return redirect('/product')->with('success_message','you have logged In successfully');
            }else{
                return redirect('/products')->with('success_message','you have logged In successfully');
            }
           }else{
            return redirect('/login_view')->with('error_message','Invalid login credentials');
        }
        
    }
    /**
     * logs the user out
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect('/login_view')->with('success_message','you have logged out successfully');
    }
    /**
     * forgot password view
     */
    public function show_forgot_password()
    {
        return view('auth.forgot-password');
    }
    /**
     * check for user existance in order to update his or her details
     */
    public function forgot_password(Request $request)
    {
        $this->validate($request,[
           'email'   => 'required|email',
           'query'   => 'required|min:3|max:191'
        ]);

        $email = $request->input('email');
        $query = $request->input('query');
        $user = User::select('id','name','email')
                    ->where('email','=',$email)
                    ->where('query','=',$query)
                    ->get();
        if(count($user) > 0){
            $user_id = $user[0]->id;
            return view('auth.edit-user')->with('user_id',$user_id);
        }else{
           return redirect('/forgot_password')->with('error_message','The user you are looking for does not exist');
        }
    }
    /**
     * update user password
     */
    public function update_user_password(Request $request)
    {
         $this->validate($request,[
             'password' => 'required|min:6|max:10'
         ]);
         $id = $request->input('user_id');
         $user = User::find($id);
         $user->password = bcrypt($request->input('password'));
         $user->save();
         return redirect('/login_view');
    }

}
