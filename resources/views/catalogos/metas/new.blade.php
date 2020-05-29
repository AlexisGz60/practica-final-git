<div class="form-group">
	<div class="row">
		<div class="col-md-12">
			{!!Form::label('Nombre *')!!}
			{!! Form::text('nombre', null, ['class'=>'form-control', 'id' => 'nombre', 'required'])!!}
			{!!Form::label('Tipo de Meta *')!!}
			{!!Form::select('tipo', ['Variable','Fijo'], 0,['class'=>'form-control','placeholder'=>'Selecciona partida', 'id'=>'status', 'required', 'onchange'=>'tipoMetas(this.value)'])!!}
			{!!Form::label('Estatus *')!!}
			{!!Form::select('status', ['Inactivo','Activo'], null,['class'=>'form-control','placeholder'=>'Selecciona partida', 'id'=>'status', 'required'])!!}
		</div>
		<div class="col-md-12">
			{!!Form::label('Descripcion *')!!}
			{!! Form::textArea('descripcion', null, ['class'=>'form-control', 'id' => 'monto', 'id'=>'descripcion', 'required'])!!}
			<br>
			<div align="right" id="disponible"></div>
		</div>
		<div class="col-md-12">

			<div class="box box-success collapsed-box" id="collapseSearch">
			</div>
		</div>
		<div class="col-md-12" id="variable">
			<div class="col-md-6" align="center">
				{!!Form::label('Fecha de inicio *')!!}
				<span class="input-group-addon">
					<input type='date' class="form-control" onchange="inicio(this.value)" id="inicio1" />

					<span class="fa fa-calendar">
					</span>
				</span>
			</div>
			<div class="col-md-6" align="center">
				{!!Form::label('Fecha de termino *')!!}
				<span class="input-group-addon">
					<input type='date' class="form-control" name="plazo" />
					<span class="fa fa-calendar">
					</span>
				</span>
				<br>
			</div>
		</div>
		<div class="col-md-12" id="fijo" hidden="true">
			<div class="col-md-6" align="center">
				{!!Form::label('Fecha de inicio *')!!}
				<span class="input-group-addon">
					<input type='date' class="form-control" onchange="inicio(this.value)" id="inicio2"/>

					<span class="fa fa-calendar">
					</span>
				</span>
			</div>
			<div class="col-md-6" align="center">
				{!!Form::label('Periodo de tiempo *')!!}
				{!!Form::select('periodo', ['Semanal','Mensual','Semestral','Anual'], null,['class'=>'form-control','placeholder'=>'Selecciona partida', 'id'=>'status'])!!}
				<br>
			</div>
		</div>
		<div class="col-md-12">

			<div class="box box-success collapsed-box" id="collapseSearch">
			</div>
		</div>
	</div>

	<div class="col-md-12"> 
		{!!Form::label('* Monto $')!!}
		<div class="input-group m-b">
			<span class="input-group-addon bg-aqua">$</span>
			{!! Form::number('monto', 0, ['class'=>'form-control','step'=>'any', 'id' => 'otros', 'onchange' => 'validaCantidades(this.value)'])!!}<span class="input-group-addon bg-gray">**</span>
		</div>
		<br>
	</div>
</div>
{!! Form::hidden('fecha_inicio', null, ['class'=>'form-control', 'id'=>'fecha_inicio'])!!}