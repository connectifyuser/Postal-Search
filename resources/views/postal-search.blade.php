@extends('layouts.master')
@section('title', 'Home')
@section('content')
<h4 class="text-center mt-5">Search Post Office Details By PIN Code</h4>
<div class="row">
	 <img id="loaderimg" src="{{asset ('/image/loader.gif')}}">
	<div class="col-md-4 offset-md-4 mt-5">
		<div class="d-flex justify-content-center">
			<div class="input-group">
			  <input type="search" class="post_code_inp form-control rounded" placeholder=" PIN Code (6 Character)" aria-label="Search"
			    aria-describedby="search-addon" />
			  <button type="button" class="btn btn-outline-primary search-btn">search</button>
			</div>
	</div>
	</div>
</div>

<div class="container postal_data_main">
	<div class="row">
		<div class="col-md-12 mt-5">
			<table class="table postaltable">
				<thead class="thead-dark">
				<tr>
				<th scope="col">Sno</th>
				<th scope="col">Name</th>
				<th scope="col">BranchType</th>
				<th scope="col">Circle</th>
				<th scope="col">District</th>
				</tr>
			</thead>
			<tbody class="postal-data">
			</tbody>
			</table>
		</div>
	</div>
</div>
<div class="no_record">
	
</div>
	
@endsection