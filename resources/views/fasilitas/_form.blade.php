<div class="form-group{{ $errors->has('nama') ? 'has-error' : '' }}">
	<label>nama</label>
	<div class="form-line">
		{!! Form::text('nama',null,['class'=>'form-control']) !!}
		{!! $errors->first('nama','<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('lokasi') ? 'has-error' : '' }}">
	<label>lokasi</label>
	
		{!! Form::text('lokasi',null,['class'=>'form-control']) !!}
		{!! $errors->first('lokasi','<p class="help-block">:message</p>') !!}
	
</div>

<div class="pull-right">
               {!! Form::button('<i class="fa fa-fw fa-lg fa-check-circle"></i> Simpan', ['class'=>'btn bg-aqua','type'=>'submit']) !!}&nbsp;&nbsp;&nbsp;
                 {!! Form::button('<i class="fa fa-refresh"></i> Reset', ['class'=>'btn bg-red','type'=>'reset']) !!}
              </div>