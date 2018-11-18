@extends('add_remove')
@section('content')
@foreach ($return_result as $post)
	<h2> {{ $post }} </h2>
@endforeach
@stop