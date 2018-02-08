<div class="form-group{{ $errors->has('judul') ? 'has-error' : '' }}">
	<label>judul</label>
	<div class="form-line">
		{!! Form::text('judul',null,['class'=>'form-control']) !!}
		{!! $errors->first('judul','<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('isi') ? 'has-error' : '' }}">
	<label>Isi</label>
	
		{!! Form::textarea('isi',null,['class'=>'form-control','id'=>'editor1']) !!}
		{!! $errors->first('isi','<p class="help-block">:message</p>') !!}
	
</div>
<div class="form-group{{ $errors->has('tanggal') ? 'has-error' : '' }}">
	<label for="datetimepicker">Tanggal Masuk</label>
	<div class="input-group date"  id='datetimepicker2'>
		{!! Form::date('tanggal',null,['class'=>'form-control','id'=>'datetimepicker2']) !!}
		 <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
		{!! $errors->first('tanggal','<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('ket') ? 'has-error' : '' }}">
	<label>Keterangan</label>
	<div class="form-line">
		{!! Form::text('ket',null,['class'=>'form-control']) !!}
		{!! $errors->first('ket','<p class="help-block">:message</p>') !!}
	</div>
</div>

  
            

<div class="pull-right">
               {!! Form::button('<i class="fa fa-fw fa-lg fa-check-circle"></i> Simpan', ['class'=>'btn bg-aqua','type'=>'submit']) !!}&nbsp;&nbsp;&nbsp;
                 {!! Form::button('<i class="fa fa-refresh"></i> Reset', ['class'=>'btn bg-red','type'=>'reset']) !!}
              </div>