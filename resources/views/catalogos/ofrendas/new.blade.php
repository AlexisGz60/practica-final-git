<div class="form-group">
	<div class="row">
		<div class="col-md-12">
			{!!Form::label('Nombre *')!!}
			{!! Form::text('nombre', null, ['class'=>'form-control', 'id' => 'nombre', 'required'])!!}
			{!!Form::label('Estatus *')!!}
			{!!Form::select('status', ['Inactivo','Activo'], null,['class'=>'form-control','placeholder'=>'Selecciona partida', 'id'=>'status', 'required'])!!}
		</div>
		<div class="col-md-12">
			{!!Form::label('Descripcion *')!!}
			{!! Form::textArea('descripcion', null, ['class'=>'form-control', 'id' => 'monto', 'id'=>'descripcion', 'required'])!!}
			<div align="right" id="disponible"></div>
		</div>
	</div>
</div>