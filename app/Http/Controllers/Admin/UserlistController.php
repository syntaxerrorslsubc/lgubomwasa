<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_role;
use Illuminate\Support\Facades\Hash;

class UserlistController extends Controller
{
    public function index(){
        // return view('Admin/user.list');
       $users = User::all();
        return view('Admin/user.list', compact('users'));

    }

    public function layout(){
        $user = User::find($id);
        return view('layouts/Admin.default', compact('user'));
    }

     public function add_user(){
        return view('Admin/user.add_user');
    }

    public function saveUser(Request $request){
        $saveNewUser = new User; 
        $saveNewUser->name = $request->name;
        $saveNewUser->email = $request->email;
        $saveNewUser->password = Hash::make($request->password);
        $saveNewUser->type = $request->type;
        // $saveNewUser->avatar = $request->avatar;

        // if ($request->hasFile('avatar')) {
        // $avatar = $request->file('avatar');
        // $avatarName = time().'.'.$avatar->getClientOriginalExtension();
        // $avatar->move(public_path('img'), $avatarName);
        // $data['img'] = $avatarName;
        // }
        
        if($saveNewUser->save()){
            $saveUser_role = new User_role;
            $saveUser_role->userid = $saveNewUser->type;
            $saveUser_role->roleid = $request->type;
            if ($request->type==1) {
                $saveUser_role->role_name = "Admin";
            }elseif ($request->type==2) {
                $saveUser_role->role_name = "Cashier";
            }elseif ($request->type==3){
                $saveUser_role->role_name = "Meter Reader";
            }

            if($saveUser_role->save()){
                return redirect()->route('adminuser')->with('success', 'User added successfully');
            }

        }
     }



    public function edituser(Request $request)
        {
            $user=User::where('id', $request->id)->first();
    
             return view('Admin.user.edit_user',[
                 'user'=>$user
             ]);
        }

    public function updateUser(Request $request){
            $updatedUser = User::where('id', $request->id)->first(); 
            $updatedUser->name = $request->name;
            $updatedUser->email = $request->email;
            $updatedUser->password = Hash::make($request->password);
            $updatedUser->type = $request->type;
            $updatedUser->avatar = $request->avatar;
                    
            if($updatedUser->save()){
            return redirect()->route('adminuser')->with('success', 'User updated successfully');
         }
    }

     public function list(){
      $Users=User::orderby('id')->paginate(10);
        return view('Admin/user.list', [
                    'users'=>$Users
            ]);

    }

    public function deleteUser($id)
    {
      $users = User::find($id);

      if ($users) {
        $users->delete();
      }

      return redirect('/admin/user')
        ;

  }
}
