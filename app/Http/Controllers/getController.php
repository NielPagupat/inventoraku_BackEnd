<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_credentials;
use Illuminate\Support\Facades\DB;
class getController extends Controller
{
    public function login(Request $req){
        $email = $req -> query('Email');
        $checkEmail = DB::table('user_credentials') -> where('email', $email)->exists();

        if($checkEmail){
            $userPass = DB::select('select password from user_credentials where email = ?', array($email));
            return response() -> json(['status'=>200, 'password'=>$userPass]);
        } else{
            return response() -> json(['status'=>200, 'match'=>false]);
        }
    }

    public function getUserData(Request $req){
        $email = $req -> query('Email');
        $getData = DB::table('user_info') -> where('email', $email) -> get();
        return response() -> json(['status'=>200, 'userData'=>$getData]);
    }

    public function getProduct(Request $req){
        $uid = (int)$req -> query('userID');
        $productData = DB::table('products_table')-> where('user_id', $uid) -> get();
        return response() -> json(['status'=>200, 'userData'=>$productData]);
    }

    public function getProdPrice(Request $req){
        $UID = $req -> query('UID');
        $PID = $req -> query('PID');

        $getPrice = DB::select('call getPrice(?,?)', array($UID, $PID));

        if ($getPrice) {
            return response() -> json(['status'=>200, 'price' => $getPrice]);
        } else {
            return response() -> json(['status'=>200, 'price' => 0]);
        }
    }

    public function getResDet(Request $req){
        $UID = $req -> query('UID');
        $PID = $req -> query('PID');

        $res = DB::select('call getResInfo(?,?)', [$UID, $PID]);

        return response() -> json(['status'=>200, 'info'=>$res]);
    }

    public function getProfit(Request $req){
        $UID = $req -> query('UID');

        $res = DB::select('call getProfit(?)', array($UID));
        return response() -> json(['status'=>200, 'allprofit'=>$res]);
    }

    public function getItemProfit(Request $req){
        $UID = $req -> query('UID');
        $res = DB::select('call getItemSold(?)', array($UID));
        return response() -> json(['status'=>200, 'itemProfit'=>$res]);
    }

    public function getSingleDaily(Request $req){
        $UID = $req -> query('UID');
        $Date = $req -> query('Date');

        $res = DB::select('call singleDailyTotal(?,?)', array($UID, $Date));

        return response() -> json(['status' => 200, 'record'=>$res]);
    }
    public function getSingleWeekly(Request $req){
        $UID = $req -> query('UID');
        $Date = $req -> query('Date');

        $res = DB::select('call singleWeeklyTotal(?,?)', array($UID, $Date));

        return response() -> json(['status' => 200, 'record'=>$res]);
    }
    public function getSingleMonthly(Request $req){
        $UID = $req -> query('UID');
        $Date = $req -> query('Date');

        $res = DB::select('call singleMonthlyTOtal(?,?)', array($UID, $Date));

        return response() -> json(['status' => 200, 'record'=>$res]);
    }
    public function getSingleYearly(Request $req){
        $UID = $req -> query('UID');
        $Date = $req -> query('Date');

        $res = DB::select('call singleYearlyTotal(?,?)', array($UID, $Date));

        return response() -> json(['status' => 200, 'record'=>$res]);
    }
    public function getTotalDaily(Request $req){
        $UID = $req -> query('UID');
        $Date = $req -> query('Date');

        $res = DB::select('call totalDailySummary(?,?)', array($UID, $Date));

        return response() -> json(['status' => 200, 'record'=>$res]);
    }
    public function getTotalWeekly(Request $req){
        $UID = $req -> query('UID');
        $Date = $req -> query('Date');

        $res = DB::select('call totalWeeklySummary(?,?)', array($UID, $Date));

        return response() -> json(['status' => 200, 'record'=>$res]);
    }
    public function getTotalMonthly(Request $req){
        $UID = $req -> query('UID');
        $Date = $req -> query('Date');

        $res = DB::select('call totalMonthlySummary(?,?)', array($UID, $Date));

        return response() -> json(['status' => 200, 'record'=>$res]);
    }
    public function getTotalYearly(Request $req){
        $UID = $req -> query('UID');
        $Date = $req -> query('Date');

        $res = DB::select('call totalYearlySummary(?,?)', array($UID, $Date));

        return response() -> json(['status' => 200, 'record'=>$res]);
    }

    public function getIncompleteOrderInfo(Request $req){
        $UID = $req -> query('UID');

        $res = DB::select('call getIncompleteOrderInfo(?)', array($UID));

        return response() -> json(['status'=>200, 'orderInfo'=>$res]);
    }

    public function getCompletedOrderInfo(Request $req){
        $UID = $req -> query('UID');
        $res = DB::select('call getCompletedOrderInfo(?)', array($UID));

        return response() -> json(['status'=>200, 'orderInfo'=>$res]);
    }
}
