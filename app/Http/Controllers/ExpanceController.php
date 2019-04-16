<?php

namespace App\Http\Controllers;

use App\Expance;
use Illuminate\Http\Request;

class ExpanceController extends Controller
{
    public function daily_expance_data(){
        $show_expanse = Expance::orderBy('id', 'desc')->get();
        return view('admin.expance.daily-expanse', compact('show_expanse'));
    }

    public function save_expance_data(Request $get){
        $get->validate([
            'expanse' => 'required|max:255',
            'date' => 'required',
        ]);

        $daily_expanse = new Expance();
        $daily_expanse->expanse  = $get->expanse;
        $daily_expanse->date  = $get->date;

        if ($daily_expanse->save()){
            return response()->json("success");
        }else{
            return response()->json("error");
        }
    }

    public function get_expance_data(){
        $show_expanse = Expance::orderBy('id', 'desc')->get();
        return view('admin.expance.show-expanse', compact('show_expanse'));
    }
}
