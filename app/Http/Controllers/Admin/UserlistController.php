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
        return view('Admin/user.list');
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
        $saveNewUser->avatar = $request->avatar;
        
        if($saveNewUser->save()){
            $saveUser_role = new User_role;
            $saveUser_role->userid = $saveNewUser->id;
            $saveUser_role->roleid = $request->type;
            if ($request->type==1) {
                $saveUser_role->role_name = "Admin";
            }elseif ($request->type==2) {
                $saveUser_role->role_name = "Cashier";
            }elseif ($request->type==3){
                $saveUser_role->role_name = "Meter Reader";
            }

            if($saveUser_role->save()){
                return redirect()->back()->withErrors('Success','New user has been created successfully.');
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

    public function updateuser(Request $request)
        {
            $saveUser->name = $request->name;
            $saveUser->email = $request->email;
            $saveUser->password = Hash::make($request->password);
            $saveUser->type = $request->type;
            $saveUser->avatar = $request->avatar;
                    
                if($saveUser->save()){
                    return redirect()->back()->withErrors('Success','Category has been updated successfully.');
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

    public function uploadImage(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust validation rules as needed
        ]);

        $imagePath = $request->file('avatar')->store('images', 'public');

        return view('Admin/user.add_user', ['imagePath' => $imagePath]);
    }

}
