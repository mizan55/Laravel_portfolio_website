@extends('layout.app')
@section('content')
<div class="container d-none" id="main-div">
<div class="row">
<div class="col-md-12 p-5">
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



@endsection

@section('script')
<script type="text/javascript">
 
  getServiceData();
</script>

@endsection