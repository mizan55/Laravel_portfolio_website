$(document).ready(function () {
$('#VisitorDt').DataTable();
$('.dataTables_length').addClass('bs-select');
});




function getServiceData(){

axios.get('/getservicedata')
.then(function(response){
$('#main-div').removeClass('d-none');
$('#loader-div').addClass('d-none');
if(response.status==200){
	
	$('#serviceTable').empty();
	var jsonServiceData = response.data;
$.each(jsonServiceData,function(i,item){
 $('<tr>').html(

"<td><img class='table-img' src="+jsonServiceData[i].service_img+"></td>"+
"<td>"+jsonServiceData[i].service_name+"</td>"+
"<td>"+jsonServiceData[i].service_des+"</td>"+
"<td><a href='' ><i class='fas fa-edit'></i></a></td>"+
"<td><a class='serviceDeleteBtn' data-toggle='modal' data-target='#basicExampleModal' data-id="+jsonServiceData[i].id+"  href='' ><i class='fas fa-trash-alt'></i></a></td>"
).appendTo('#serviceTable');


});

// catch id from request
$('.serviceDeleteBtn').click(function(){
	var id = $(this).data('id');
	$('#delete-id').html(id); //data-id er vitor id pathaba
});

//send id to getServiceDelete function para meter
$('#yes').click(function(){
	var id = $('#delete-id').html();
	getServiceDelete(id);

});//end send id to getServiceDelete function para meter

}else{ 
		  
	  $('#loader-div').addClass('d-none');
       $('#wrong-div').removeClass('d-none');

}


})
.catch(function(error){
	 $('#loader-div').addClass('d-none');
       $('#wrong-div').removeClass('d-none');

})


} //end getSeviceDataFunction



//deleteService start 

function getServiceDelete(deleteId){
	axios.post('/serviceDelete',{id:deleteId})
	.then(function(response){
	if(response.data==1){
	$('#basicExampleModal').modal('hide');
	toastr.success('Hi! I am success message.');
		getServiceData();
	}else{
	toastr.error('Hi! I am error message.');
			$('#basicExampleModal').modal('hide');
		getServiceData();
	}
	}) //end then
	.catch(function(error){

	}) //end catch
}