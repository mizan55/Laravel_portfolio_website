//course data get
function getCoursesData() {

    axios.get('/getCourseData')
        .then(function(response) {

            if (response.status == 200) {
                $('#main-divCourse').removeClass('d-none');
                $('#loader-divCourse').addClass('d-none');

                $('#courseTable').empty();
                var jsonServiceData = response.data;
                $.each(jsonServiceData, function(i, item) {
                    $('<tr>').html(
                            "<td>" + jsonServiceData[i].course_name + "</td>" +
                              "<td>" + jsonServiceData[i].course_fee + "</td>" +
                                 "<td>" + jsonServiceData[i].course_totalclass + "</td>" +
                              "<td>" + jsonServiceData[i].course_totalenroll + "</td>" +
                           "<td><a class='courseViewDetailsBtn' data-toggle='modal' data-target='#editModal' data-id=" + jsonServiceData[i].id + "  ><i class='fas fa-eye'></i></a></td>" +
                        "<td><a class='courseEditBtn' data-toggle='modal' data-target='#UpdateCourseModal' data-id=" + jsonServiceData[i].id + "  ><i class='fas fa-edit'></i></a></td>" +
                        "<td><a class='courseDeleteBtn' data-toggle='modal' data-target='#basicExampleModal' data-id=" + jsonServiceData[i].id + "  href='' ><i class='fas fa-trash-alt'></i></a></td>"
                    ).appendTo('#courseTable');


                });

             

             
                  // catch id from request
                $('.courseDeleteBtn').click(function() {
                    var id = $(this).data('id');
                   
                    $('#deleteCourse-id').html(id); //data-id er vitor id pathaba
                });

               // catch id from request for edit
                $('.courseEditBtn').click(function() {
                    var id = $(this).data('id');
                     getCourseEdit(id);
                    $('#course-editid').html(id); //data-id er vitor id pathaba
                });   // end catch id from request for edit



           

            } else {

                $('#loader-divCourse').addClass('d-none');
                $('#wrong-divCourse').removeClass('d-none');

            }


        })
        .catch(function(error) {
            $('#loader-divCourse').addClass('d-none');
            $('#wrong-divCourse').removeClass('d-none');

        })


} //end getCoursesData


//COURSE ADD
//Course add new btn click
$('#addCourseBtn').click(function(){
    $('#addCourseModal').modal('show');
}); 

//Course add value catch
 $('#CourseAddConfirmBtn').click(function() {
                
                      var name = $('#CourseNameId').val();

                    var desc = $('#CourseDesId').val();
                    var fee = $('#CourseFeeId').val();
                    var totalenroll = $('#CourseEnrollId').val();
                    var totalclass = $('#CourseClassId').val();
                    var link = $('#CourseLinkId').val();
                    var img = $('#CourseImgId').val();
                    getCourseAdd(name,desc,fee,totalenroll,totalclass,link,img); 
                   
});//end Course catch value


//Service Add method
function getCourseAdd(course_name,course_desc,course_fee,course_totalenroll,course_totalclass,course_link,course_img) {
   

   
   if(course_name.length== 0)
   { 
      toastr.error('course_name name is empty');
   
   }
   else if(course_desc.length==0)
   {
      toastr.error('course_desc desc is empty');
    
   }

  else if(course_fee.length==0)
   { 
      toastr.error('course_fee img is empty');
     
   }

   else if(course_totalenroll.length==0)
   { 
      toastr.error('course_totalenroll name is empty');
   
   }
  else if(course_totalclass.length==0)
   {
      toastr.error('course_totalclass desc is empty');
    
   }

  else if(course_link.length==0)
   { 
      toastr.error('course_link img is empty');
     
   }
   else  if(course_img.length==0)
   { 
      toastr.error('course_img img is empty');
     
   }else{
    $('#CourseAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
    axios.post('/courseAdd', {
                       course_name: course_name,
                       course_desc: course_desc,
                         course_fee: course_fee,
                       course_totalenroll: course_totalenroll,
                         course_totalclass: course_totalclass,
                       course_link: course_link,
                       course_img: course_img,
        })
        .then(function(response) {
             $('#CourseAddConfirmBtn').html("Save");

             if (response.status == 200){
                          if (response.data == 1) {
                       
                        $('#addCourseModal').modal('hide');
                        toastr.success('successfully add.');
                        getCoursesData();
                      
                    }else{
                        $('#addCourseModal').modal('hide');
                        toastr.error('Hi! I am error message.');

                        getCoursesData();
                    } //end if
             }else{
                 $('#addCourseModal').modal('hide');
                        toastr.error('something went wrong');
             }

         
          
        }) //end then
        .catch(function(error) {
                $('#addCourseModal').modal('hide');
                        toastr.error('something went wrong');          
        }) //end catch

   } //end else

       

}      //add function



//deleteService start 




   //send id to getServiceDelete function para meter
$('#confirmCourseDeletbutton').click(function() {
                    var id = $('#deleteCourse-id').html();

                    getCourseDelete(id);

 }); //end send id to getServiceDelete function para meter

function getCourseDelete(deleteId) {
      $('#confirmCourseDeletbutton').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //set animation..
    axios.post('/courseDelete', {
            id: deleteId
        })
        .then(function(response) {
              $('#confirmCourseDeletbutton').html('Yes'); //set yes after animation
        if (response.status == 200){
                  if (response.data == 1) {
                $('#basicExampleModal').modal('hide');
                toastr.success('delete success.');
               getCoursesData();
            }else{
                $('#basicExampleModal').modal('hide');
                toastr.error('delete fail.');

                getCoursesData();
            } //end if
        }else{
                  $('#basicExampleModal').modal('hide');
                   toastr.error('delete fail');
        }
          
        }) //end then
        .catch(function(error) {
             $('#basicExampleModal').modal('hide');
                   toastr.error('Somethig went wrong');

        }) //end catch
}

///end delet



//editService start 

function getCourseEdit(editId) {
    axios.post('/courseEdit', {
            id: editId
        })
        .then(function(response) {

            if(response.status==200){
                   $('#courseedit-loader-div').addClass('d-none');
                    $('#course-edit-form').removeClass('d-none');
                var jasonData = response.data;
                $('#CourseNameUpdateId').val(jasonData[0].course_name);
                 $('#CourseDesUpdateId').val(jasonData[0].course_desc);
                  $('#CourseFeeUpdateId').val(jasonData[0].course_fee);
                   $('#CourseEnrollUpdateId').val(jasonData[0].course_totalenroll);
                 $('#CourseClassUpdateId').val(jasonData[0].course_totalclass);
                  $('#CourseLinkUpdateId').val(jasonData[0].course_link);
                    $('#CourseImgUpdateId').val(jasonData[0].course_img);
            }else{
                  $('#courseedit-loader-div').addClass('d-none');
                    $('#courseedit-wrong-div').removeClass('d-none');
            }
          
        }) //end then
        .catch(function(error) {
                 $('#courseedit-loader-div').addClass('d-none');
                    $('#courseedit-wrong-div').removeClass('d-none');
        }) //end catch
}



//UpdateCourses start 

     //send id to editservice function para meter
                $('#CourseUpdateConfirmBtn').click(function() {
                    var id = $('#course-editid').html();
                  var name=  $('#CourseNameUpdateId').val();
                   var desc= $('#CourseDesUpdateId').val();
                   var fee= $('#CourseFeeUpdateId').val();
                   var totalenroll= $('#CourseEnrollUpdateId').val();
                   var totalclass= $('#CourseClassUpdateId').val();
                   var link= $('#CourseLinkUpdateId').val();
                   var img=  $('#CourseImgUpdateId').val();
                    getCourseUpdate(id,name,desc,fee,totalenroll,totalclass,link,img); 
                   

                });//end send id to editservice function para meter

function getCourseUpdate(id,course_name,course_desc,course_fee,course_totalenroll,course_totalclass,course_link,course_img) {
   
   if(course_name.length== 0)
   { 
      toastr.error('course_name name is empty');
   
   }
   else if(course_desc.length==0)
   {
      toastr.error('course_desc desc is empty');
    
   }

  else if(course_fee.length==0)
   { 
      toastr.error('course_fee img is empty');
     
   }

   else if(course_totalenroll.length==0)
   { 
      toastr.error('course_totalenroll name is empty');
   
   }
  else if(course_totalclass.length==0)
   {
      toastr.error('course_totalclass desc is empty');
    
   }

  else if(course_link.length==0)
   { 
      toastr.error('course_link img is empty');
     
   }
   else  if(course_img.length==0)
   { 
      toastr.error('course_img img is empty');
     
   }else{
  $('#CourseUpdateConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //set animation..
    axios.post('/courseUpdate', {
                        id:id,
                        course_name: course_name,
                       course_desc: course_desc,
                         course_fee: course_fee,
                       course_totalenroll: course_totalenroll,
                         course_totalclass: course_totalclass,
                       course_link: course_link,
                       course_img: course_img,
        })
        .then(function(response) {
             $('#CourseUpdateConfirmBtn').html("Save");

             if (response.status == 200){
                          if (response.data == 1) {
                      
                        $('#UpdateCourseModal').modal('hide');
                        toastr.success('successfully updated.');
                       getCoursesData();
                       
                    }else{
                        $('#UpdateCourseModal').modal('hide');
                        toastr.error('not updated.');

                         getCoursesData();
                    } //end if
             }else{
                 $('#UpdateCourseModal').modal('hide');
                        toastr.error('something went wrong');
             }

         
          
        }) //end then
        .catch(function(error) {
                $('#UpdateCourseModal').modal('hide');
                        toastr.error('something went wrong');          
        }) //end catch




   } //end else

       


 
}
