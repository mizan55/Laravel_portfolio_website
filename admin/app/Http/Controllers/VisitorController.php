<?php

namespace App\Http\Controllers;
use App\Models\VisitorModel;

use Illuminate\Http\Request;

class VisitorController extends Controller
{
   function VisitorIndex(){
 
   $visitorData= json_decode(VisitorModel::orderBy('id','desc')->take(10)->get());
    return view('visitor',['visitorData'=> $visitorData]); // visitorData holo key and  $visitorData variable
   }
}
