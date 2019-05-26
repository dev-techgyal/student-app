@extends('layouts.admin')
@section('content')
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">{{ env('APP_NAME') }}</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><span class="fa fa-home"></span></a>
						</li>
						<li class="breadcrumb-item active">Home</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<h3>{{ number_format($files) }}</h3>

							<p>Student Files</p>
						</div>
						<div class="icon">
							<i class="fa fa-files-o"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i
									class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h3>{{ number_format($students) }}</h3>

							<p>Students</p>
						</div>
						<div class="icon">
							<i class="fa fa-graduation-cap"></i>
						</div>
						<a href="{{ route('admin.view.student') }}" class="small-box-footer">More info <i
									class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
						<div class="inner">
							<h3>{{ number_format($sys_users) }}</h3>

							<p>System Users</p>
						</div>
						<div class="icon">
							<i class="fa fa-users"></i>
						</div>
						<a href="{{ route('admin.view.sys.user') }}" class="small-box-footer">More info <i
									class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
							<h3>&nbsp;</h3>

							<p>Others</p>
						</div>
						<div class="icon">
							<i class="fa fa-optin-monster"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i
									class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
@endsection