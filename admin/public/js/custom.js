$(document).ready(function () {
$('#VisitorDt').DataTable();
$('.dataTables_length').addClass('bs-select');
});


function getServiceData(){
$('#main-div').removeClass('d-none');
$('#loader-div').addClass('d-none');
axios.get('/getservicedata')
.then(function(response){

if(response.status==200){
	var jsonServiceData = response.data;
$.each(jsonServiceData,function(i,item){
 $('<tr>').html(

"<td><img class='table-img' src="+jsonServiceData[i].service_img+"></td>"+
"<td>"+jsonServiceData[i].service_name+"</td>"+
"<td>"+jsonServiceData[i].service_des+"</td>"+
"<td><a href='' ><i class='fas fa-edit'></i></a></td>"+
"<td><a href='' ><i class='fas fa-trash-alt'></i></a></td>"
).appendTo('#serviceTable');


});

}else{
		  
	  $('#loader-div').addClass('d-none');
       $('#wrong-div').removeClass('d-none');

}


})
.catch(function(error){
	 $('#loader-div').addClass('d-none');
       $('#wrong-div').removeClass('d-none');

})

} //getSeviceDataFunction