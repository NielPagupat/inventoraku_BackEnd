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
}
