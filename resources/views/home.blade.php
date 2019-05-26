@extends('layouts.user')
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
						<li class="breadcrumb-item"><a href="{{ route('home') }}"><span class="fa fa-home"></span></a>
						</li>
						<li class="breadcrumb-item active">Home</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
			<hr>
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
							<h3>&nbsp;</h3>

							<p>Certificate</p>
						</div>
						<div class="icon">
							<i class="fa fa-file-pdf-o"></i>
						</div>
						<a href="{{ asset("student_files") }}/{{ $file->file_paths['certificate'] }}"
						   class="small-box-footer">More info <i
									class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h3>&nbsp;</h3>

							<p>Image</p>
						</div>
						<div class="icon">
							<i class="fa fa-file-image-o"></i>
						</div>
						<a href="{{ asset("student_files") }}/{{ $file->file_paths['image'] }}"
						   class="small-box-footer">More info <i
									class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
						<div class="inner">
							<h3>&nbsp;</h3>

							<p>Others</p>
						</div>
						<div class="icon">
							<i class="fa fa-optin-monster"></i>
						</div>
						<a href="index.html#" class="small-box-footer">More info <i
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
						<a href="index.html#" class="small-box-footer">More info <i
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