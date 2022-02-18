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

<!-- loader -->
<div class="container d-none" id="wrong-div">
<div class="row">
<div class="col-md-12 p-5 text-center">
<h3>Something went Wrong!</h3>
</div>
</div>
</div>

<!--end loader -->

@endsection

@section('script')
<script type="text/javascript">
	getServiceData();
</script>

@endsection