<?php

namespace App\Http\Controllers;

use App\Border;
use App\User;
use Illuminate\Http\Request;
use Auth;
class BorderController extends Controller
{
    public function index(){
        $user = User::with('Border')->where(['id'=>auth::user()->id, 'admin'=>0])->get();
        return view('users.borders-dashboard', compact('user'));
    }


    public function add_meal(Request $request){
        $add_border = new Border();
        auth::user()->id;
        $add_border->name = $request->name;
        $add_border->date = $request->date;
        $add_border->breakfast = $request->breakfast;
        $add_border->lunch = $request->lunch;
        $add_border->dinner = $request->dinner;
        $add_border->user_id = auth::user()->id;
        $add_border->save();
        return redirect()->back()->with('message', 'Data Add Successfully');
    }
}
