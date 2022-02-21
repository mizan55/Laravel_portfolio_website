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
         $ServiceData= json_encode(ServicesModel::all());
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
    }  //end delet

       function serviceEdit(Request $request){
             $id=$request->input('id');
             $result=json_encode(ServicesModel::where('id','=',$id)->get());
             return  $result;
    }


     function serviceUpdate(Request $request)
     {
             $id=$request->input('id');
               $name=$request->input('name');
                 $des=$request->input('des');
                   $img=$request->input('img');
                     $result= ServicesModel::where('id','=',$id)->update(['service_name'=>$name,'service_des'=>$des,'service_img'=>$img]);


                        if($result){return 1;}
                        else
                         {
                         return 0;
                         }
            
    }


    function serviceAdd(Request $request)
     {
             $id=$request->input('id');
               $name=$request->input('name');
                 $des=$request->input('des');
                   $img=$request->input('img');
                     $result= ServicesModel::insert(['service_name'=>$name,'service_des'=>$des,'service_img'=>$img]);


                        if($result){return 1;}
                        else
                         {
                         return 0;
                         }
            
    }


} //class end
  

  