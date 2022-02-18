<?php

namespace App\Http\Controllers;
use App\Models\VisitorModel;
use App\Models\ServicesModel;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function HomeIndex(){
        $UserIp=$_SERVER['REMOTE_ADDR']; // toGet visitor ip addrass
  
        date_default_timezone_set('Asia/Dhaka');// timezone set
        $timeDate = date(format: "Y-m-d h:i:sa"); //to catch when visit
        VisitorModel::insert(['ip_address'=> $UserIp,'visit_time'=>$timeDate ]);

        //service data fetch
        $ServiceData=json_decode(ServicesModel::all());
        //end service data fetch
        return view('Home',['ServiceData'=>$ServiceData]);
    }
}
