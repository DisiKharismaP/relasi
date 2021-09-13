<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function createPhone(Request $request){
        if(User::where('id', $request->user_id)->first()){
            $phone = new Phone();
            $phone->phone = $request->phone;
            $phone->user_id = $request->user_id;
            $phone->save();
            $status = "Success";
            return response()->json(compact('status', 'phone'), 200);
        }
        $status = "failed";
        return response()->json(compact('status'), 401);
    }

    public function getPhone(Request $request){
        $phone = Phone::where('user_id', $request->user_id)->get();
        $status = "Success";
        return response()->json(compact('status', 'phone'), 200);
    }
}
