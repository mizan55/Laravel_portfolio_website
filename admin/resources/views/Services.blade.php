@extends('layout.app')
@section('content')
<div class="container d-none" id="main-div">
<div class="row">

<div class="col-md-12 p-5">
  <button class="button btn-danger btn-sm mb-2" id="addServiceBtn">Add Service</button>
<table id="" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Image</th>
    <th class="th-sm">Name</th>
    <th class="th-sm">Description</th>
    <th class="th-sm">Edit</th>
    <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="serviceTable">
  
  
  
  
  </tbody>
</table>

</div>
</div>
</div>


<!-- loader -->
<div class="container " id="loader-div">
<div class="row">
<div class="col-md-12 p-5 mt-5 text-center">
<img class="loading" src="{{asset('images/loader.gif')}}">
</div>
</div>
</div>

<!--end loader -->

<!-- Something went Wrong! -->
<div class="container d-none" id="wrong-div">
<div class="row">
<div class="col-md-12 p-5 text-center">
<h3>Something went Wrong!</h3>
</div>
</div>
</div>

<!--end Something went Wrong! -->

<!--delete Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body text-center p-3">
      <h5 class="mt-3">Do you want to delete?</h5>
    <h5 id="delete-id" class="mt-3"></h5>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">NO</button>
        <button id='yes' type="button" class="btn btn-sm btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>
<!-- End delete Modal -->



<!--update Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body text-center p-3">
      
    <h5 id="edit-id" class="mt-3"></h5>
<div class=" d-none" id="edit-form">
     <input type="text" id="serviceName" class="form-control mb-4 " placeholder="Service name">
      <input type="text" id="serviceDesc" class="form-control mb-4" placeholder="Service Description">
      <input type="text" id="serviceImg" class="form-control mb-4" placeholder="img link">
</div>

      <!-- loader -->
<div class="container " id="edit-loader-div">
<div class="row">
<div class="col-md-12 p-5 mt-5 text-center">
<img class="loading" src="{{asset('images/loader.gif')}}">
</div>
</div>
</div>

<!--end loader -->

<!-- Something went Wrong! -->
<div class="container d-none" id="edit-wrong-div">
<div class="row">
<div class="col-md-12 p-5 text-center">
<h3>Something went Wrong!</h3>
</div>
</div>
</div>

<!--end Something went Wrong! -->
    
      </div>
   
     

      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button id='Save' type="button" class="btn btn-sm btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- End delete Modal -->


<!-Add Modal -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body text-center p-3">
      
    <h5 id="edit-id" class="mt-3">Add new Service</h5>
<div  id="edit-form">
     <input type="text" id="serviceNameAdd" class="form-control mb-4 " placeholder="Service name">
      <input type="text" id="serviceDescAdd" class="form-control mb-4" placeholder="Service Description">
      <input type="text" id="serviceImgAdd" class="form-control mb-4" placeholder="img link">
</div>

      <!-- loader -->
<!-- <div class="container " id="edit-loader-div">
<div class="row">
<div class="col-md-12 p-5 mt-5 text-center">
<img class="loading" src="{{asset('images/loader.gif')}}">
</div>
</div>
</div> -->

<!--end loader -->

<!-- Something went Wrong! -->
<!-- <div class="container d-none" id="edit-wrong-div">
<div class="row">
<div class="col-md-12 p-5 text-center">
<h3>Something went Wrong!</h3>
</div>
</div>
</div> -->

<!--end Something went Wrong! -->
    
      </div>
   
     

      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button id='addNewButton' type="button" class="btn btn-sm btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Add modal end -->

@endsection

@section('script')
<script type="text/javascript">

  getServiceData();


  
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
</script>

@endsection