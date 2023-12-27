<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class postController extends Controller
{
    public function registerUser(Request $req){
        $email = $req -> input('Email');
        $password = $req -> input('Password');
        $fname = $req -> input('Fname');
        $lname = $req -> input('Lname');
        $mi = $req -> input('MI');
        $address = $req -> input('Addr');
        $businessName = $req -> input('Bname');
        $businessAddress = $req -> input('Baddress');
        $bPermit = $req -> input('Bpermit');
        $paymentOpt = $req -> input('Payopt');
        $ownType = $req -> input('OwnType');

        //dump([$email, $password, $fname, $lname, $mi, $address, $businessName, $businessAddress, $paymentOpt, $ownType, $bPermit]);
        $regCred = DB::select('call register_userCredentials(?, ?)', array($email, $password));
        $regUser = DB::select('call register_userInfo(?,?,?,?,?,?,?,?,?,?)', 
                        array($email, $fname, $lname, $mi, $address, $businessName, $businessAddress, $paymentOpt, $ownType, $bPermit));
        if ($regCred and $regUser) {
            return response() -> json(['status'=>'registered']);
        } else {
            return response() -> json(['status'=>'failed']);
        }
    }

    public function addProduct(Request $req){
        $UserID = $req -> input('UID');
        $ProductID = $req -> input('PID');
        $ProductName = $req -> input('Pname');
        $ProductStock = $req -> input('Pstock');
        $PCP = $req -> input('PCP');
        $PRP = $req -> input('PRP');
        $Desc = $req -> input('Desc');

        $addProduct = DB::select('call addProduct(?,?,?,?,?,?,?)', array($UserID, $ProductID, $ProductName, $ProductStock, $PCP, $PRP, $Desc));

        if ($addProduct) {
            return response() -> json(['status'=>'product added']);
        } else {
            return response() -> json(['status'=>'failed']);
        }

    }
}
