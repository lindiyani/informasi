@extends('layouts.admin')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<ul class="breadcrumb">
					<li><a href="{{ url('/admin/profil') }}">Profil</a></li>
					<li class="active">Tambah Profil</li>
				</ul>
				<div class="panel panel-default">
					<div class="panel-heading bg-aqua">
						<h2 class="panel-title">Tambah Profil</h2>
					</div>

					<div class="panel-body">
					<table class="table">
						{!! Form::open(['url'=>route('profil.store'),
						'method'=>'post','class'=>'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
						@include('profil._form')
						{!! Form::close() !!}
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection