@extends('adminlte::page')

@section('title', 'Proveedor')

@section('content_header')
  @if (session()->has('message'))
    <div class="{{session('status')}} alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('message') }}
    </div>
    @endif 
    <h1>Listado de Proveedores</h1>
@stop

@section('content')
 <table id="proveedorstable" class="table table-striped table-hover mt-4" style="width:100%">
	<thead>
	<tr>
      <th scope="col">#</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">RUT</th>
      <th scope="col">TELEFONO</th>
      <th scope="col">CORREO</th>
      <th scope="col">DIRECCION</th>
      <th scope="col">@can('proveedor.edit')FUNCIONES @endcan</th>
	</tr>
	</thead>
	<tbody>
		@foreach($proveedors as $proveedor)
		<tr>
      <th scope="row">{{$proveedor->id}}</th>
      <td>{{$proveedor->nombre}}</td>
      <td>{{$proveedor->rut}}</td>
      <td>{{$proveedor->telefono}}</td>
      <td>{{$proveedor->email}}</td>
      <td>{{$proveedor->direccion}}</td>
      <td>
        @can('proveedor.edit')
      	<form action="{{route('proveedor.destroy',$proveedor->id)}}" method="POST">
      	<a class="btn btn-info" href="/proveedor/{{$proveedor->id}}/edit ">EDITAR</a>
      	@csrf
      	@method('DELETE')
      	<button class="btn btn-danger" type="submit" onClick="javascript: return confirm('¿Estas seguro?');">ELIMINAR</button>
      	</form>
        @endcan
      </td>
    </tr>
    @endforeach
	</tbody>
</table>
@stop

@section('css')
<!--BOOSTRAP ICONS-->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

<!--DATATABLE-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css ">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchpanes/1.4.0/css/searchPanes.dataTables.min.css ">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css ">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css ">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css ">

@stop

@section('js')
<!--JQUERY-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!--DATATABLE-->

<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js "></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.colVis.min.js "></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js "></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js "></script>
<script type="text/javascript" src="https://cdn.datatables.net/searchpanes/1.4.0/js/dataTables.searchPanes.min.js "></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js "></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js "></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js "></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js "></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js "></script>


<script type="text/javascript">
  $(document).ready(function() {
    $('#proveedorstable').DataTable( {
        dom: 'Bfrtip',
        buttons: ['excel'],
        "lengthMenu":[[10,50,-1],[10,50,"Todos"]]
    });
} );
</script>
@stop