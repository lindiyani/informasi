<div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
	<label>email</label>
	<div class="form-line">
		{!! Form::email('email',null,['class'=>'form-control']) !!}
		{!! $errors->first('email','<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('subjek') ? 'has-error' : '' }}">
	<label>subjek</label>
	<div class="form-line">
		{!! Form::text('subjek',null,['class'=>'form-control']) !!}
		{!! $errors->first('subjek','<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('isi') ? 'has-error' : '' }}">
	<label>Isi</label>
	
		{!! Form::textarea('isi',null,['class'=>'form-control','id'=>'editor1']) !!}
		{!! $errors->first('isi','<p class="help-block">:message</p>') !!}
	
</div>
           

<div class="pull-right">
               {!! Form::button('<i class="fa fa-fw fa-lg fa-check-circle"></i> Simpan', ['class'=>'btn bg-aqua','type'=>'submit']) !!}&nbsp;&nbsp;&nbsp;
                 {!! Form::button('<i class="fa fa-refresh"></i> Reset', ['class'=>'btn bg-red','type'=>'reset']) !!}
              </div>