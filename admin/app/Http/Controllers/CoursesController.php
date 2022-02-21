<?php

namespace App\Http\Controllers;
use App\Models\CourseModel;

use Illuminate\Http\Request;

class CoursesController extends Controller
{
       function CourseIndex(){
        
        return view('Courses');
    } // end Courses Index

       function getCourseData(){
         $CourseData= json_encode(CourseModel::all());
          return $CourseData;
    }// end getServiceData

        function courseDelete(Request $request){
        $id=$request->input('id');
            $result=CourseModel::where('id','=',$id)->delete();
            if($result){
                return 1;
            }else{
                return 0;
            }
    }  //end delet

         function courseEdit(Request $request){
             $id=$request->input('id');
             $result=json_encode(CourseModel::where('id','=',$id)->get());
             return  $result;
    }

function courseUpdate(Request $request)
     {
                    $id=$request->input('id');
                     $course_name=$request->input('course_name');
                 $course_desc=$request->input('course_desc');
                   $course_fee=$request->input('course_fee');
                    $course_totalenroll=$request->input('course_totalenroll');
                     $course_totalclass=$request->input('course_totalclass');
                     $course_link=$request->input('course_link');
                      $course_img=$request->input('course_img');
                     $result= CourseModel::where('id','=',$id)->update([
                            'course_name'=>$course_name,
                            'course_desc'=>$course_desc,
                            'course_fee'=>$course_fee,
                             'course_totalenroll'=>$course_totalenroll,
                            'course_totalclass'=>$course_totalclass,
                            'course_link'=>$course_link,
                              'course_img'=>$course_img

                     ]);


                        if($result){return 1;}
                        else
                         {
                         return 0;
                         }
            
    }//endcourse update  


     function courseAdd(Request $request)
     {              
                     $course_name=$request->input('course_name');
                     $course_desc=$request->input('course_desc');
                     $course_fee=$request->input('course_fee');
                     $course_totalenroll=$request->input('course_totalenroll');
                     $course_totalclass=$request->input('course_totalclass');
                     $course_link=$request->input('course_link');
                      $course_img=$request->input('course_img');
                     $result= CourseModel::insert(['course_name'=>$course_name,
                            'course_desc'=>$course_desc,
                            'course_fee'=>$course_fee,
                             'course_totalenroll'=>$course_totalenroll,
                            'course_totalclass'=>$course_totalclass,
                            'course_link'=>$course_link,
                              'course_img'=>$course_img]);


                        if($result==true){return 1;}
                        else
                         {
                         return 0;
                         }
            
    }



} //end class