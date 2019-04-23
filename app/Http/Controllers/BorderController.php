<?php

namespace App\Http\Controllers;

use App\Border;
use App\Deposit;
use App\User;
use Illuminate\Http\Request;
use Auth;
class BorderController extends Controller
{
    public function index(){
        $user = User::with('Border')->where(['id'=>auth::user()->id, 'admin'=>0])->get();
        $totalMeal = Border::selectRaw('sum(breakfast) as breakfast,sum(lunch) as lunch, sum(dinner) as dinner, name')->groupBy('name')->get();
        $deposit = Deposit::selectRaw('sum(balance) as balance, name')->where('name',auth::user()->name )->groupBy('name')->get();
        $meal = Deposit::all();

        $rate = 0;
        foreach ($meal as $key => $total){
            $rate = ($rate + ($total->balance));
        }


        $depositAmount = 0;
        foreach($deposit as $key => $show){
            $depositAmount = ($depositAmount + ($show->balance));
        }

        return view('users.borders-dashboard', compact('user', 'totalMeal', 'depositAmount', 'rate'));
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
