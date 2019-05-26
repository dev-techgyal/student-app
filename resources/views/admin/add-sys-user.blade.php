@extends('layouts.admin')

@section('content')

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h5>New System User</h5>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><span class="fa fa-home"></span></a>
						</li>
						<li class="breadcrumb-item active">System User</li>
					</ol>
				</div>
			</div>
			<hr>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-md-12 col-sm-12 col-xs-12">
					<!-- general form elements -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title"><span class="fa fa-plus-square"></span> System User</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<div class="row">
							<div class="col-md-12">
								<form role="form" action="{{ route('admin.add.sys.user') }}" method="POST"
								      id="{{ env('APP_NAME') }}">
									@csrf
									<div class="card-body">
										@include('inc.alert')
										<div class="form-group">
											<label for="name">Name</label>
											<input type="text"
											       class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
											       id="name" name="name" value="{{ old('name') }}"
											       placeholder="Enter System User Name" required>

											@if ($errors->has('name'))
												<span class="invalid-feedback">
			                                        <strong>{{ $errors->first('name') }}</strong>
			                                    </span>
											@endif
										</div>
										<div class="form-group">
											<label for="phone_number">Phone Number</label>
											<input type="text"
											       class="form-control {{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
											       id="phone_number" name="phone_number" value="{{ old('phone_number') }}"
											       placeholder="Enter System User Phone Number i.e 0725912502" required
											       >

											@if ($errors->has('phone_number'))
												<span class="invalid-feedback">
			                                        <strong>{{ $errors->first('phone_number') }}</strong>
			                                    </span>
											@endif
										</div>
										<div class="form-group">
											<label for="email">Email Address</label>
											<input type="email"
											       class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
											       id="email" name="email" value="{{ old('email') }}"
											       placeholder="Enter System User Email" required>

											@if ($errors->has('email'))
												<span class="invalid-feedback">
			                                        <strong>{{ $errors->first('email') }}</strong>
			                                    </span>
											@endif
										</div>
										<div class="form-group">
											<br>
											<button type="submit" class="btn btn-primary pull-right"><span
														class="fa-plus-square fa"></span> Add
											</button>
										</div>
									</div>
									<!-- /.card-body -->
								</form>
							</div>
						</div>
					</div>
					<!-- /.card -->
				</div>
				<!--/.col (left) -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
@endsection

@section('scripts')
	<script>
		document.querySelector('#{{ env('APP_NAME') }}').addEventListener('submit', function (e) {
			let form = this;

			e.preventDefault(); // <--- prevent form from submitting

			swal({
				title: "Add System User",
				text: "Are you sure you want to proceed?",
				type: "question",
				showCancelButton: true,
				// confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, I am sure!',
				cancelButtonText: "No, cancel it!",
				closeOnConfirm: false,
				closeOnCancel: false,
				dangerMode: true,
			}).then((willPromote) => {
				e.preventDefault();
				if (willPromote.value) {
					form.submit(); // <--- submit form programmatically
				} else {
					swal("Cancelled :)", "", "success");
					e.preventDefault();
					$('#loading').hide();
					return false;
				}
			});
		});
	</script>
@endsection