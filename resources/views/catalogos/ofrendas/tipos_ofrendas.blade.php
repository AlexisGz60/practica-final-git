@extends('layouts.main')
@section('title', 'Ofrendas Catalogo')
@section('content')
<div class="box"> 
	<div class="box-header" align="center">
		<div class="pull-center box-title">
			Tipos de ofrendas
		</div>
		<div class="pull-right box-title">
			@if(Auth::user()->is_administrador())
			<a class="btn btn-primary" onclick="addTipo()">
				<i class="fa fa-plus"></i>
				Agregar Tipo de Ofrenda
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
							@foreach($tipos as $t)
							<tr>
								<td>{!!$count=$count+1!!}</td>
								<td>{!!$t->nombre!!}</td>
								<td>{!!$t->descripcion!!}</td>
								<td>{!!$t->statusOfr()!!}</td>
								<th>
									<a href="#editTipoOfr" class="btn btn-warning btn-sm" data-toggle="modal" data-programa="{{$t}}" title="Editar Origen del Recurso">
										<i class="fa fa-pencil"></i>
									</a>
								</th>
								<th>
									{!! Form::open(['route'=> ['destroy.tipo', $t->id],'method'=>'DELETE'])!!}
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
<div class="modal fade" id="addTipoOfr">
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
			{!! Form::open(array('url'=>'createTipos','method'=>'POST')) !!}
			{!! csrf_field() !!}
			<div class="modal-body">
				@include('catalogos.ofrendas.new')
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
	function addTipo(){
		$('#addTipoOfr').modal('show');
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
		$('#addTipoOfr').on('hidden.bs.modal', function () {
			$('#nombre').val('');
			$('#status').val('');
			$('#descripcion').val('');
		});
	});
</script>
@endsection