@extends('adminlte::page')

@section('title', 'Servicios Clinicos')

@section('content_header')
    <h1>Listado de Servicios Clinicos</h1>
@stop

@section('content')
  @if (session()->has('message'))
    <div class="{{session('status')}} alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('message') }}
    </div>
    @endif 
 <table id="serviciosclinicostable" class="table table-striped table-hover mt-4" style="width:100%">
	<thead>
	<tr>
      <th scope="col">#</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">UBICACIÓN</th>
      <th scope="col">RESPONSABLE</th>
      <th scope="col">CORREO DEL RESPONSABLE</th>
      <th scope="col">@can('servicioclinico.edit') FUNCIONES @endcan</th>
	</tr>
	</thead>
	<tbody>
		@foreach($servicioclinicos as $servicioclinico)
		<tr>
      <th scope="row">{{$servicioclinico->id}}</th>
      <td>{{$servicioclinico->nombre}}</td>
      <td>{{$servicioclinico->ubicacion}}</td>
      <td>{{$servicioclinico->responsable}}</td>
      <td>{{$servicioclinico->email_responsable}}</td>
      <td>
        @can('servicioclinico.edit') 
      	<form action="{{route('servicioclinico.destroy',$servicioclinico->id)}}" method="POST">
      	<a class="btn btn-info" href="/servicioclinico/{{$servicioclinico->id}}/edit ">EDITAR</a>
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
    $('#serviciosclinicostable').DataTable( {
        dom: 'Bfrtip',
        buttons: ['excel'],
        "lengthMenu":[[10,50,-1],[10,50,"Todos"]]
    });
} );
</script>
@stop