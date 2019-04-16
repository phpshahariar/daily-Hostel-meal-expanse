<?php

namespace App\Http\Controllers;

use App\Border;
use App\Deposit;
use App\Expance;
use App\User;
use Illuminate\Http\Request;
use DB;
use Session;
class AdminController extends Controller
{
    public function login_dashboard(Request $request){
//     return view('admin.admin-dashboard');

        $email = $request->email;
        $password = $request->password;
        $result = DB::table('admins')
                    ->where('email', $email)
                    ->where('password', $password)
                    ->first();

        if ($result){
            Session::put('email', $result->email);
            Session::put('id', $result->id);
            return redirect('/admin-dashboard');

        }else{
            return redirect('/admin');
        }
    }


    public function admin_dashboard()
    {
        $show_expanse = Expance::get();
        $deposit = Deposit::all();
        $totalBorder = User::all();
        $totalMeal = Border::selectRaw('sum(breakfast) as breakfast,sum(lunch) as lunch, sum(dinner) as dinner, name')->groupBy('name')->get();



        $depositAmount = 0;
        foreach($deposit as $key => $show){
            $depositAmount = ($depositAmount + ($show->balance));
        }


        $expanseAmount = 0;
        foreach($show_expanse as $key => $show){
            $expanseAmount = ($expanseAmount + ($show->expanse));
        }

        $totalDeposit = $depositAmount - $expanseAmount;
//        return $totalDeposit;



        return view('admin.admin-dashboard',
            compact('show_expanse', 'deposit', 'totalDeposit', 'totalBorder', 'totalMeal', 'depositAmount'));
    }


}
