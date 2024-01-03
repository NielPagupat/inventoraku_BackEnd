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

    public function saveEditProduct(Request $req) {
        $PID = $req -> input('PID');
        $UID = $req -> input('UID');
        $Pname = $req -> input('Pname');
        $CP = $req -> input('CP');
        $RP = $req -> input('RP');
        $Desc = $req -> input('Desc');
        // return response() -> json(['status:'=>200, "message"=>[$Pname, $CP, $RP, $Desc, $PID, $UID]]);
        $save = DB::select('call EditProductInfo(?,?,?,?,?,?)', array($Pname, $CP, $RP, $Desc, $PID, $UID));
        if ($save) {
           return response() -> json(['status:'=>200, "message"=>"saved"]);
        } else {
           return response() -> json(['status:'=>505, "message"=>[$Pname, $CP, $RP, $Desc, $PID, $UID]]);
        }

    }
    public function itemSold(Request $req) {
        $TID = $req -> input('TID');
        $PID = $req -> input('PID');
        $UID = $req -> input('UID');
        $Name = $req -> input('Name');
        $Rprice = $req -> input('Rprice');
        $Cprice = $req -> input('Cprice');
        $Quantity = $req -> input('Quantity');

        $save = DB::select('call itemSold(?,?,?,?,?,?,?)', array($PID, $UID, $Name, $Cprice, $Rprice, $Quantity, $TID));
        
        if ($save) {
            return response() -> json(['status'=>200, 'response'=>'Item Saved']);
        } else {
            return response() -> json(['status'=>200, 'response'=>'fail']);
        }
    }

    public function totalSold(Request $req){
        $TID = $req -> input('TID');
        $UID = $req -> input('UID');
        $Capital = $req -> input('capital');
        $Retail = $req -> input('retail');
        $Profit = $req -> input('Profit');

        $save = DB::select('call setSoldTotal(?,?,?,?,?)', array($UID, $Capital, $Retail, $Profit, $TID));
        
        if ($save) {
            return response() -> json(['status'=>200, 'response'=>'Item Saved']);
        } else {
            return response() -> json(['status'=>200, 'response'=>'fail']);
        }

    }
    public function setResInfo(Request $req) {
        $UID = $req -> input('UID');
        $PID = $req -> input('PID');
        $Pname = $req -> input('Pname');
        $Quantity = $req -> input('QTY');
        $SuppName = $req -> input('SuppName');
        $SuppEmail = $req -> input('SuppEmail');
        $DelvAddress = $req -> input('DelvAddress');
        $ExDelvDate = $req -> input('ExDelvDate');
    
        $res = DB::select('call SetResInfo(?,?,?,?,?,?,?,?)', array($UID, $PID, $Pname, $Quantity, $SuppName, $SuppEmail, $DelvAddress, $ExDelvDate));

        return response() -> json(['status'=>200, 'result'=>$res]);
    }

    public function setAutoRes(Request $req) {
        $UID = $req -> input('UID');
        $PID = $req -> input('PID');
        $Stat = $req -> input('Status');

        $res = DB::select('call setAutoRes(?,?,?)', array($UID, $PID, $Stat));

        return response() -> json(['status' => 200, 'result' => $res]);
    }
}
