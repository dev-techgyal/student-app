@extends('layouts.admin')
@section('content')
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h5>All System Users</h5>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><span class="fa fa-home"></span></a>
						</li>
						<li class="breadcrumb-item active">System Users</li>
					</ol>
				</div>
			</div>
			<hr>
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content-header -->
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-12">
				@include('inc.alert')
				<div class="card">
					@if(count($sys_users))
						<br>
						<div class="card-header no-print">
							<div class="row">
								<div class="col-md-12">
									<input type="text" onkeyup="myFunction()"
									       placeholder="Search..."
									       title="Type to search..."
									       class="form-control tableInput">
								</div>
							</div>
							<br>
							<h3 class="card-title pull-left">
								Showing <strong>{{ count($sys_users) }}</strong> records
								of <strong>{{ $sys_users->total() }}</strong></h3>
							<ul class="pagination pagination-sm m-0 float-right">
								{{ $sys_users->links() }}
							</ul>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<div class="col-12 table-responsive">
								<table class="table table-hover biz">
									<thead>
									<tr class="text-primary">
										<th>NO</th>
										<th>Name</th>
										<th>Email</th>
										<th>Phone Number</th>
										<th>Created</th>
									</tr>
									</thead>
									<tbody>
									@php($count = 1)
									@foreach($sys_users as $sys_user)
										<tr>
											<td class="text-primary"><b>{{ $count++ }}</b></td>
											<td>{{ $sys_user->name }}</td>
											<td>{{ $sys_user->email }}</td>
											<td>{{ $sys_user->phone_number }}</td>
											<td>{{ (new \App\Http\Controllers\SystemController())->elapsedTime($sys_user->created_at) }}</td>
										</tr>
									@endforeach
									</tbody>
									<tfoot>
									<tr class="text-primary">
										<th>NO</th>
										<th>Name</th>
										<th>Email</th>
										<th>Phone Number</th>
										<th>Created</th>
									</tr>
									</tfoot>
								</table>
							</div>

							<div class="card-header no-print">
								<h3 class="card-title pull-left">Showing <strong>{{ count($sys_users) }}</strong>
									records
									of <strong>{{ $sys_users->total() }}</strong></h3>
								<ul class="pagination pagination-sm m-0 float-right">
									{{ $sys_users->links() }}
								</ul>
							</div>
						</div>
						<!-- /.card-body -->
					@else
						<center>
							<div class="col-md-6">
								<br>
								<br>
								<br>
								<h4 class="text-danger">No System Users Found</h4>
								<hr>
								<h6>
									<a href="{{ route('admin.add.sys.user') }}">
										<strong><span class="fa fa-plus-square"></span></strong>
									</a>
								</h6>
								<hr>
								<br>
								<br>
								<br>
							</div>
						</center>
					@endif
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
@endsection


@section('scripts')
	<script>
		function myFunction() {
			$(document).ready(function () {
				$(".tableInput").on("keyup", function () {
					let value = $(this).val().toLowerCase();
					$(".biz  tr").filter(function () {
						$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
					});
				});
			});
		}
	</script>
@endsection