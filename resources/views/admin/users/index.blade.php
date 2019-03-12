@extends('template.admin')

@section('title', 'Lista de usuarios')

@section('contenido')
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb breadcrumb-arrow">
			<li><a href="{{ url('admin/inicio') }}">Administrador</a></li>
	    	<li class="action"><span>Usuarios</span></li>          
	    </ol>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<h3>Lista de Usuarios <a href="#" class="addu-modal btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Registrar nuevo usuario</a></h3>
		<br>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="usersTabla">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre Completo</th>
						<th>Correo electronico</th>
						<th>Puesto</th>
						<th>Residencia de obra</th>
						<th></th>
					</tr>
					{{ csrf_field() }}
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr class="item{{ $user->iduser }}">
							<td>{{ $user->iduser }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->puesto }}</td>
							<td>{{ $user->ubicacion }}</td>
							<td>
								<button class="editu-modal btn btn-info btn-sm" data-idusers="{{$user->iduser}}" data-names="{{$user->name}}" data-emails="{{$user->email}}" data-puestos="{{$user->puesto}}" data-idresidencia="{{$user->ubicacion}}"><span class="glyphicon glyphicon-edit"></span></button>
								<button class="deleteu-modal btn btn-danger btn-sm" data-idusers="{{$user->iduser}}" data-names="{{$user->name}}" data-emails="{{$user->email}}" data-puestos="{{$user->puesto}}" data-idresidencia="{{$user->ubicacion}}"><span class="glyphicon glyphicon-trash"></span></button>
							</td>
						</tr>
					@endforeach	
				</tbody>
			</table>
		</div>
	</div>
</div>
@include('admin.users.modal.agregarUsers')
@include('admin.users.modal.editarUsers')
@include('admin.users.modal.eliminarUsers')

@endsection

@section('scripts')
	{!! Html::script('plugins/bootstrap/js/usercrud.js') !!}
@endsection
