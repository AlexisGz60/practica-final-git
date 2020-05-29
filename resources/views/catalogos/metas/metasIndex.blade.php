@extends('layouts.main')
@section('title', 'Metas Catalogo')
@section('content')
<div class="box"> 
	<div class="box-header" align="center">
		<div class="pull-center box-title">
			Agregar Meta
		</div>
		<div class="pull-right box-title">
			@if(Auth::user()->is_administrador())
			<a class="btn btn-primary" onclick="addMeta()">
				<i class="fa fa-plus"></i>
				Agregar Meta
			</a> 
			@endif
		</div>
	</div>
	<div class="box-body">
		<div class="dataTables_wrapper form-inline dt-bootstrap">
			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered table-hover" id="tObras">
						<thead>
							<tr>
								<th>#</th>
								<th>Nombre</th>
								<th>Descripcion</th>
								<th>Estatus</th>
								<th>Editar</th>
							</tr>
						</thead>
						<tbody>
							@foreach($metas as $m)
							<tr>
								<th></th>
								<th>{!!$m->nombre!!}</th>
								<th>{!!$m->descripcion!!}</th>
								<th>{!!$m->stat()!!}</th>
								<th>
									<a href="#editTipoOfr" class="btn btn-warning btn-sm" data-toggle="modal" data-programa="{{$m}}" title="Editar Meta">
										<i class="fa fa-pencil"></i>
									</a>
								</th>
								<th>
									{!! Form::open(['route'=> ['destroy.meta', $m->id],'method'=>'DELETE'])!!}
									<button type="submit" class="btn btn-danger btn-sm eliminar">
										<i class="fa fa-trash"></i>
									</button>
									{!! Form::close()!!}
								</th>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('modals')
<div class="modal fade" id="addMeta">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" align="center"> 
					<i class="fa fa-list-ol"></i> 
					Agregar Meta
				</h4>
			</div>
			{!! Form::open(array('url'=>'createMetas','method'=>'POST')) !!}
			{!! csrf_field() !!}
			<div class="modal-body">
				@include('catalogos.metas.new')
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary btn-block"  type="submit">
					<i class="fa fa-save"></i>
					Guardar
				</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
</div>

<div class="modal fade" id="editTipoOfr">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" align="center"> 
					<i class="fa fa-usd"></i> 
					Agregar Tipo de ofrenda
				</h4>
			</div>
			{!! Form::open(array('url'=>'updateTipos','method'=>'POST')) !!}
			{!! csrf_field() !!}
			<div class="modal-body">
				@include('catalogos.ofrendas.edit')
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary btn-block"  type="submit">
					<i class="fa fa-save"></i>
					Guardar
				</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	function addMeta(){
		$('#addMeta').modal('show');
	}

	$(document).ready(function (){
		$('#editTipoOfr').on('show.bs.modal', function(e) {
			var programa = $(e.relatedTarget).data().programa;
			//console.log(programa.nombre);
			$('#_nombre').val(programa.nombre);
			$('#_status').val(programa.status);
			$('#_descripcion').val(programa.descripcion);
			$('#tipoOfrenda_id').val(programa.id);
		});
		$('#editTipoOfr').on('hidden.bs.modal', function () {
			$('#_nombre').val('');
			$('#_status').val('');
			$('#_descripcion').val('');
		});
		$('#addMeta').on('hidden.bs.modal', function () {
			$('#nombre').val('');
			$('#status').val('');
			$('#descripcion').val('');
		});
	});

	function tipoMetas(tipo){
		if (tipo==true) {
			$('#fijo').show();
			$('#variable').hide();
		}else{
			$("#fijo").hide();
			$('#variable').show();
		}
	}

	function inicio(fecha){
		$('#fecha_inicio').val(fecha);
	}

</script>
@endsection
