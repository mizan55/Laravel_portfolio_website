@extends('layout.app')
@section('content')

<div class="container">
<div class="row">
<div class="col-md-12 p-5">
<table id="VisitorDt" class="table table-striped table-sm table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">NO</th>
	  <th class="th-sm">Visitor IP</th>
	  <th class="th-sm">Date & Time</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($visitorData as $visitor)
    <tr>
      <td class="th-sm">{{$visitor->id}}</td>
	  <td class="th-sm">{{$visitor->ip_address}}</td>
	  <td class="th-sm">{{$visitor->visit_time}}</td>
    </tr>
   	@endforeach
  </tbody>
</table>

</div>
</div>
</div>
@endsection