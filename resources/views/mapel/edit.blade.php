@extends('layouts.admin')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-1">
				<ul class="breadcrumb">
					<li><a href="{{ url('/admin/mapel') }}">mapel</a></li>
					<li class="active">Ubah mapel</li>
				</ul>
				<div class="panel panel-default">
				<div class="panel-heading bg-aqua">
						<h2 class="panel-title">Ubah mapel</h2>
					</div>

					<div class="panel-body">
					<table class="table">
						{!! Form::model($mapel,['url' => route('mapel.update',$mapel->id),
						'method'=>'put','class'=>'form-horizontal']) !!}
						@include('mapel._form')
						{!! Form::close() !!}
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection