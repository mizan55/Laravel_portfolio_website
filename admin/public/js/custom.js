//visitor page table code
$(document).ready(function() {
    $('#VisitorDt').DataTable();
    $('.dataTables_length').addClass('bs-select');
});


//for service table

function getServiceData() {

    axios.get('/getservicedata')
        .then(function(response) {

            if (response.status == 200) {
                $('#main-div').removeClass('d-none');
                $('#loader-div').addClass('d-none');

                $('#serviceTable').empty();
                var jsonServiceData = response.data;
                $.each(jsonServiceData, function(i, item) {
                    $('<tr>').html(

                        "<td><img class='table-img' src=" + jsonServiceData[i].service_img + "></td>" +
                        "<td>" + jsonServiceData[i].service_name + "</td>" +
                        "<td>" + jsonServiceData[i].service_des + "</td>" +
                        "<td><a class='serviceEditBtn' data-toggle='modal' data-target='#editModal' data-id=" + jsonServiceData[i].id + "  ><i class='fas fa-edit'></i></a></td>" +
                        "<td><a class='serviceDeleteBtn' data-toggle='modal' data-target='#basicExampleModal' data-id=" + jsonServiceData[i].id + "  href='' ><i class='fas fa-trash-alt'></i></a></td>"
                    ).appendTo('#serviceTable');


                });

                // catch id from request
                $('.serviceDeleteBtn').click(function() {
                    var id = $(this).data('id');
                    $('#delete-id').html(id); //data-id er vitor id pathaba
                });

             



                  // catch id from request for edit
                $('.serviceEditBtn').click(function() {
                    var id = $(this).data('id');
                     getServiceEdit(id);
                    $('#edit-id').html(id); //data-id er vitor id pathaba
                });

           

            } else {

                $('#loader-div').addClass('d-none');
                $('#wrong-div').removeClass('d-none');

            }


        })
        .catch(function(error) {
            $('#loader-div').addClass('d-none');
            $('#wrong-div').removeClass('d-none');

        })


} //end getSeviceDataFunction



//deleteService start 

   //send id to getServiceDelete function para meter
                $('#yes').click(function() {
                    var id = $('#delete-id').html();

                    getServiceDelete(id);

                }); //end send id to getServiceDelete function para meter

function getServiceDelete(deleteId) {
      $('#yes').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //set animation..
    axios.post('/serviceDelete', {
            id: deleteId
        })
        .then(function(response) {
              $('#yes').html('Yes'); //set yes after animation
        if (response.status == 200){
                  if (response.data == 1) {
                $('#basicExampleModal').modal('hide');
                toastr.success('delete success.');
                getServiceData();
            }else{
                $('#basicExampleModal').modal('hide');
                toastr.error('delete fail.');

                getServiceData();
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


//editService start 

function getServiceEdit(editId) {
    axios.post('/serviceEdit', {
            id: editId
        })
        .then(function(response) {

            if(response.status==200){
                   $('#edit-loader-div').addClass('d-none');
                    $('#edit-form').removeClass('d-none');
                var jasonData = response.data;
                $('#serviceName').val(jasonData[0].service_name);
                 $('#serviceDesc').val(jasonData[0].service_des);
                  $('#serviceImg').val(jasonData[0].service_img);
            }else{
                  $('#edit-loader-div').addClass('d-none');
                    $('#edit-wrong-div').removeClass('d-none');
            }
          
        }) //end then
        .catch(function(error) {
                 $('#edit-loader-div').addClass('d-none');
                    $('#edit-wrong-div').removeClass('d-none');
        }) //end catch
}


//UpdateService start 

     //send id to editservice function para meter
                $('#Save').click(function() {
                    var id = $('#edit-id').html();
                    var serviceName = $('#serviceName').val();
                    var serviceDesc = $('#serviceDesc').val();
                    var serviceImg = $('#serviceImg').val();
                    getServiceUpdate(id,serviceName,serviceDesc,serviceImg) 
                   

                });//end send id to editservice function para meter

function getServiceUpdate(sId,sname,desc,simg) {
   $('#Save').html("<div class='spinner-border spinner-border-sm' role='status'></div>");

    var isValid=true;
   if(sname.length==0)
   { isValid =false;
      toastr.error('service name is empty');
      return isValid;
   }
   if(desc.length==0)
   { isValid =false;
      toastr.error('service desc is empty');
      return isValid;
   }

   if(simg.length==0)
   { isValid =false;
      toastr.error('service img is empty');
      return isValid;
   }

       axios.post('/serviceUpdate', {
            id: sId,
              name: sname,
                des: desc,
                  img: simg
        })
        .then(function(response) {
             $('#Save').html("Save");

             if (response.status == 200){
                          if (response.data == 1) {
                        isValid=false;
                        $('#editModal').modal('hide');
                        toastr.success('successfully updated.');
                        getServiceData();
                        return isValid;
                    }else{
                        $('#editModal').modal('hide');
                        toastr.error('Hi! I am error message.');

                        getServiceData();
                    } //end if
             }else{
                 $('#editModal').modal('hide');
                        toastr.error('something went wrong');
             }

         
          
        }) //end then
        .catch(function(error) {
                $('#editModal').modal('hide');
                        toastr.error('something went wrong');          
        }) //end catch

//}  //end else 


 
}



//service add new btn click
$('#addServiceBtn').click(function(){
    $('#AddModal').modal('show');
}); 

    //Service catch value
                $('#addNewButton').click(function() {
                
                    var serviceName = $('#serviceNameAdd').val();
                    var serviceDesc = $('#serviceDescAdd').val();
                    var serviceImg = $('#serviceImgAdd').val();
                    getServiceAdd(serviceName,serviceDesc,serviceImg) 
                   

                });//end Service catch value


//Service Add method
function getServiceAdd(sname,desc,simg) {
   $('#addNewButton').html("<div class='spinner-border spinner-border-sm' role='status'></div>");

   
   if(sname.length==0)
   { 
      toastr.error('service name is empty');
   
   }
   if(desc.length==0)
   {
      toastr.error('service desc is empty');
    
   }

   if(simg.length==0)
   { 
      toastr.error('service img is empty');
     
   }

       axios.post('/serviceAdd', {
                       name: sname,
                des: desc,
                  img: simg
        })
        .then(function(response) {
             $('#addNewButton').html("Save");

             if (response.status == 200){
                          if (response.data == 1) {
                        isValid=false;
                        $('#AddModal').modal('hide');
                        toastr.success('successfully add.');
                        getServiceData();
                        return isValid;
                    }else{
                        $('#AddModal').modal('hide');
                        toastr.error('Hi! I am error message.');

                        getServiceData();
                    } //end if
             }else{
                 $('#AddModal').modal('hide');
                        toastr.error('something went wrong');
             }

         
          
        }) //end then
        .catch(function(error) {
                $('#AddModal').modal('hide');
                        toastr.error('something went wrong');          
        }) //end catch

//}  //end else 


 
}