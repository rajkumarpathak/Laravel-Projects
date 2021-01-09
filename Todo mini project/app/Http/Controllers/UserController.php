<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class UserController extends Controller
{
    public function uploadAvatar(Request $request){

        if ($request->hasFile('image')) {
            User::uploadAvatar($request->image);
           /*  $request->session()->flash('message','Image Uploaded'); */
            return redirect()->back()->with('message','Image Uploaded'); // success uploaded
        }
       /*  $request->session()->flash('error','Image not Uploaded'); */
        return redirect()->back()->with('error','Image not Uploaded');// error message
    
    }
    public function index(){

        /* $user = new User();
        $user->name = 'rajkumar';
        $user->email = 'rajkumar@gmail.com';
        $user->password = bcrypt('password');
        $user->save(); */

       /*  $user = User::all();
        return $user; */

        /* User::where('id', 3)->update(['name' => 'raj']); */

        /* $data = [
            'name' => 'elon',
            'email' => 'elon@gmail.com',
            'password' => 'elonpassword',

        ];

        User::create($data); */

        $user = User::all();
        return $user;

        /* User::where('id' , 2)->delete(); */
        /* DB::table('users')->insert([
            'name' => 'rajkumar',
            'email' => 'raj@abc.com',
            'password' => 'password'
        ]); */

        /* $user = DB::select('select *from users');
        return $user; */

        /* DB::update('update users set name=? where id= 1', ['raj']); */

        /* DB::delete('delete from users where id= 1'); */

        /* $user = DB::select('select *from users');
        return $user; */

        /* return 'i am in index funtion'; */
    }
}
