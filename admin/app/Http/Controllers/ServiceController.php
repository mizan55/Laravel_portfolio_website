<?php

namespace App\Http\Controllers;
use App\Models\ServicesModel;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    function ServiceIndex(){
        
        return view('Services');
    } // end Service Index

    function getServiceData(){
         $ServiceData= json_decode(ServicesModel::all());
          return $ServiceData;
    }// end getServiceData


    function serviceDelete(Request $request){
        $id=$request->input('id');
            $result=ServicesModel::where('id','=',$id)->delete();
            if($result){
                return 1;
            }else{
                return 0;
            }
    }

} //class end
