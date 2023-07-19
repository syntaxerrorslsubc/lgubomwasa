<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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
        $saveNewUser->password = $request->password;
        
        if($saveNewUser->save()){
          return redirect()->back()->withErrors('Success','New user has been created successfully.');
        }
     }



    public function edituser(Request $request)
        {
            $user=User::where('id', $request->id)->first();
    
             return view('Admin.user.edit_user',[
                 'user'=>$user
             ]);
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
