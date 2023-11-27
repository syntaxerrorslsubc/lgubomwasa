<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User_role;

class CustomAuthController extends Controller
{
 
     use AuthenticatesUsers;

    public function redirectTo(){
         $role = User_role::where('userid',Auth::user()->type)->first();
         dd($role);
        if ($role->roleid==1){
             return '/admin';
        }elseif ($role->roleid==2) {
             return '/cashier';
        }elseif ($role->roleid==3) {
             return '/meterreader';
        }
    }

    public function index()
    {
        return view('Auth.login');
    }  
       
 
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
             $role = User_role::where('userid',Auth::user()->type)->first();
            if (Auth::user() && $role->roleid==1){
                 return redirect('/admin');
            }elseif(Auth::user() && $role->roleid==2){
                 return redirect('/cashier');
            }elseif(Auth::user() && $role->roleid==3){
                 return redirect()->intended('/meterreader');
        }
    }
        return redirect("/login")->withSuccess('Login details are not valid');
    }
 
 
 
    public function registration()
    {
        return view('Auth.registration');
    }
       
 
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'type' => 'required'
        ]);
            
        $data = $request->all();
        $check = $this->create($data);
          
        return redirect("dashboard")->withSuccess('You have signed-in');
    }
 
 
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
     
 
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
   
        return redirect("login")->withSuccess('You are not allowed to access');
    }
     
 
    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return Redirect('login');
    }
}