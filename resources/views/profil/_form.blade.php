<div class="form-group{{ $errors->has('nama') ? 'has-error' : '' }}">
	<label>Nama</label>
	<div class="form-line">
		{!! Form::text('nama',null,['class'=>'form-control']) !!}
		{!! $errors->first('nama','<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('sejarah') ? 'has-error' : '' }}">
	<label>sejarah</label>
	<div class="form-line">
		{!! Form::text('sejarah',null,['class'=>'form-control']) !!}
		{!! $errors->first('sejarah','<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('logo') ? 'has-error' : '' }}">
    <label>Logo</label>
    <div class="form-line">
        {!! Form::file('logo',null,['class'=>'form-control']) !!}
        {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('alamat') ? 'has-error' : '' }}">
	<label>alamat</label>
	<div class="form-line">
		{!! Form::text('alamat',null,['class'=>'form-control']) !!}
		{!! $errors->first('alamat','<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
	<label>email</label>
	<div class="form-line">
		{!! Form::email('email',null,['class'=>'form-control']) !!}
		{!! $errors->first('email','<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('nohp') ? 'has-error' : '' }}">
	<label>nohp</label>
	<div class="form-line">
		{!! Form::number('nohp',null,['class'=>'form-control']) !!}
		{!! $errors->first('nohp','<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="pull-right">
               {!! Form::button('<i class="fa fa-fw fa-lg fa-check-circle"></i> Simpan', ['class'=>'btn bg-aqua','type'=>'submit']) !!}&nbsp;&nbsp;&nbsp;
                 {!! Form::button('<i class="fa fa-refresh"></i> Reset', ['class'=>'btn bg-red','type'=>'reset']) !!}
              </div>