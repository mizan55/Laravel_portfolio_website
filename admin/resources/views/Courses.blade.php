@extends('layout.app')
@section('content')
<div class="container d-none" id="main-divCourse">
<div class="row">
<div class="col-md-12 p-5">
	<button class="button btn-danger btn-sm mb-2" id="addCourseBtn">Add Courses</button>

<!-- FetchData-->
<table id="" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Name</th>
	  <th class="th-sm">Fee</th>
	  <th class="th-sm">Class</th>
	  <th class="th-sm">Enroll</th>
	  <th class="th-sm">Details</th>
	  	  <th class="th-sm">edit</th>
	  	   <th class="th-sm">delete</th>
    </tr>
  </thead>
  <tbody id="courseTable">
  
	
	
	
	
  </tbody>
</table> <!-- end table -->




</div>
</div>
</div>
<!-- loader -->
<div class="container " id="loader-divCourse">
<div class="row">
<div class="col-md-12 p-5 mt-5 text-center">
<img class="loading" src="{{asset('images/loader.gif')}}">
</div>
</div>
</div>

<!--end loader -->

<!-- Something went Wrong! -->
<div class="container d-none" id="wrong-divCourse">
<div class="row">
<div class="col-md-12 p-5 text-center">
<h3>Something went Wrong!</h3>
</div>
</div>
</div>

<!--end Something went Wrong! -->
<!-- end FetchData-->


<!-- add modal -->
<div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Add New Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center">
       <div class="container">
       	<div class="row">
       		<div class="col-md-6">
             	<input id="CourseNameId" type="text" id="" class="form-control mb-3" placeholder="Course Name">
          	 	<input id="CourseDesId" type="text" id="" class="form-control mb-3" placeholder="Course Description">
    		 	<input id="CourseFeeId" type="text" id="" class="form-control mb-3" placeholder="Course Fee">
     			<input id="CourseEnrollId" type="text" id="" class="form-control mb-3" placeholder="Total Enroll">
       		</div>
       		<div class="col-md-6">
     			<input id="CourseClassId" type="text" id="" class="form-control mb-3" placeholder="Total Class">      
     			<input id="CourseLinkId" type="text" id="" class="form-control mb-3" placeholder="Course Link">
     			<input id="CourseImgId" type="text" id="" class="form-control mb-3" placeholder="Course Image">
       		</div>
       	</div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="CourseAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- end add modal -->


<!--delete Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body text-center p-3">
      <h5 class="mt-3">Do you want to delete?</h5>
    <h5 id="deleteCourse-id" class="mt-3"></h5>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">NO</button>
        <button id='confirmCourseDeletbutton' type="button" class="btn btn-sm btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>
<!-- End delete Modal -->


<!-- Course Update modal -->
<div class="modal fade" id="UpdateCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Edit Course</h5>

             <h5 class="modal-title" id="course-editid"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center">
       <div class="container">
       	<div  id="course-edit-form" class="d-none">
       	<div class="row">

       		<div class="col-md-6">

             	<input id="CourseNameUpdateId" type="text" id="" class="form-control mb-3" placeholder="Course Name">
          	 	<input id="CourseDesUpdateId" type="text" id="" class="form-control mb-3" placeholder="Course Description">
    		 	<input id="CourseFeeUpdateId" type="text" id="" class="form-control mb-3" placeholder="Course Fee">
     			<input id="CourseEnrollUpdateId" type="text" id="" class="form-control mb-3" placeholder="Total Enroll">
       		</div>
       		<div class="col-md-6">
     			<input id="CourseClassUpdateId" type="text" id="" class="form-control mb-3" placeholder="Total Class">      
     			<input id="CourseLinkUpdateId" type="text" id="" class="form-control mb-3" placeholder="Course Link">
     			<input id="CourseImgUpdateId" type="text" id="" class="form-control mb-3" placeholder="Course Image">
       		</div>
       	</div>
       	<div  id="course-edit-form">
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="CourseUpdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
    	 <!-- loader -->
<div class="container " id="courseedit-loader-div">
<div class="row">
<div class="col-md-12 p-5 mt-5 text-center">
<img class="loading" src="{{asset('images/loader.gif')}}">
</div>
</div>
</div>

<!--end loader -->

<!-- Something went Wrong! -->
<div class="container d-none" id="courseedit-wrong-div">
<div class="row">
<div class="col-md-12 p-5 text-center">
<h3>Something went Wrong!</h3>
</div>
</div>
</div>

<!--end Something went Wrong! -->


  </div>
</div>
<!-- end Course Update  modal -->

@endsection

@section('script')
<script type="text/javascript">
getCoursesData();
</script>

@endsection