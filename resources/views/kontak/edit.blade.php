@extends('layouts.admin')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<ul class="breadcrumb">
					<li><a href="{{ url('/admin/kontak') }}">kontak</a></li>
					<li class="active">Ubah kontak</li>
				</ul>
				<div class="panel panel-default">
				<div class="panel-heading bg-aqua">
						<h2 class="panel-title">Ubah kontak</h2>
					</div>

					<div class="panel-body">
					<table class="table">
						{!! Form::model($kontak,['url' => route('kontak.update',$kontak->id),
						'method'=>'put','class'=>'form-horizontal']) !!}
						@include('kontak._form')
						{!! Form::close() !!}
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection