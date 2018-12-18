@if(Session::get('level')==0)
	<script type="text/javascript">
		window.location="/";
	</script>
@else
	@extends('app')
	@section('title', 'Alumno')
	@section('content')
		<br>
		<h1>Bienvenido {{Session::get('user')}}</h1>
		<br>
		<h5>Salas Disponibles</h5>
		<center><br>
		@if(isset($data))
			<div style="visibility: none" value={{$flag=True}}></div>
			@foreach($data as $o)
				@if($o->time_sala>=date("Y-m-d H:i:s"))
					<button class="btn" style="margin-left: 20px; background: #5396ff">{{$o->cod_cur}}<br>{{$o->nom_tema}}<br>{{$o->id_sal}}</button>
				@else
					{{$flag=False}}	
				@endif
			@endforeach
			@if($flag==False)
				No existen salas disponibles
			@endif
		@else
			No existen salas disponibles
		@endif
		</center><br><br>
		<h5>Foros Cerrados</h5><br>
		<center>
		@if(isset($data))
			<div style="visibility: none" value={{$flag=True}}></div>
			@foreach($data as $o)
				@if($o->time_sala<date("Y-m-d H:i:s"))
					<button class="btn" style="margin-left: 20px; background: #5396ff">{{$o->cod_cur}}<br>{{$o->nom_tema}}<br>{{$o->id_sal}}</button>
				@else
					{{$flag=False}}	
				@endif
			@endforeach
			@if($flag==False)
				No existen foros disponibles
			@endif
		@else
			No existen foros disponibles
		@endif
		</center>
	@endsection
@endif