@extends('layouts.master')

@section('NoiDung')
<h2>{{$KhoaHoc}}</h2>
@if($KhoaHoc != "")
{!!"Đang ở trang ".$KhoaHoc.'</br>'!!}
@else
@endif
@for($i = 0;$i <=10;$i++)
	{{$i." "}}
@endfor
@endsection()