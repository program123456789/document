@extends('show_result')
@section('content')


<TABLE id="dataTable" width="350px" border="1">
	<br>
	<TR>
        <TH> نام </TH>
        <TH> نوع </TH>
        <TH> فایل </TH>
        <TH> تاریخ</TH>
    </TR>
@foreach ($return_result  as $value)
	<TR>
        <TH> {{ $value->name }}</TH>
        <TH> {{ $value->data_type }}</TH>
        <TH> {{ $value->file_path }}</TH>
        <TH> {{ $value->created_at }} </TH>
    </TR>
@endforeach

</TABLE>
@stop