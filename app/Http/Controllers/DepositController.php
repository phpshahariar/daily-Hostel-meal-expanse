<?php

namespace App\Http\Controllers;

use App\Deposit;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function border_deposit(){
        $deposit = Deposit::orderBy('id', 'desc')->paginate(10);
        return view('admin.deposit.deposit', compact('deposit'));
    }

    public function add_deposit(Request $get){

        $get->validate([
            'name' => 'required|max:255',
            'balance' => 'required|max:5',
            'date' => 'required',
        ]);

        $insert = Deposit::insert([
            "name" => $get->name,
            "balance" => $get->balance,
            "date" => $get->date,

        ]);

        if ($insert){
            return response()->json("success");
        }else{
            return response()->json("error");
        }
    }

    public function get_deposit(){
        $deposit = Deposit::orderBy('id', 'desc')->paginate(10);
        $i = 1;
        return view('admin.deposit.show-deposit', compact('deposit', 'i'));
    }

    public function view_deposit(Request $get){
        $id = $get->id;
        $deposit = Deposit::find($id);
        return $deposit;
    }

    public function delete_deposit_data(Request $get){
        $id = $get->id;
        $delete = Deposit::where("id", $id)->delete();
        if ($delete){
            return response()->json("success");
        }else{
            return response()->json("error");
        }
    }

    public function edit_deposit_data(Request $get){
        $id = $get->id;
        $edit_data = Deposit::find($id);
        return $edit_data;
    }

    public function update_deposit_data(Request $get){

        $get->validate([
            'name' => 'required|max:255',
            'balance' => 'required|max:4',
            'date' => 'required',
        ]);

        $update_data = Deposit::where('id', $get->id)->update([
            "name" => $get->name,
            "balance" => $get->balance,
            "date" => $get->date,
        ]);
        if ($update_data){
            return response()->json("success");
        }else{
            return response()->json("error");
        }
    }

    public function pagination_deposit_data(){
        $deposit = Deposit::latest()->paginate(10);
        $i = 1;
        return view('admin.deposit.pagination', compact('deposit', 'i'));
    }

}
