<?php

namespace App\Http\Controllers;
use App\Models\VisitorModel;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function HomeIndex(){
        $UserIp=$_SERVER['REMOTE_ADDR']; // toGet visitor ip addrass
  
        date_default_timezone_set('Asia/Dhaka');// timezone set
        $timeDate = date(format: "Y-m-d h:i:sa"); //to catch when visit
        VisitorModel::insert(['ip_address'=> $UserIp,'visit_time'=>$timeDate ]);
        return view('Home');
    }
}
