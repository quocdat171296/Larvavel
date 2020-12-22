@extends('layouts.master')

@section('NoiDung')
<h2>{{$KhoaHoc}}</h2>
{{--Đây là comment--}}
<b>Câu lệnh if</b>
</br>
@if($KhoaHoc != "")
{!!"Đang ở trang ".$KhoaHoc.'</br>'!!}
@else
@endif
<b>Câu lệnh for</b>
</br>
@for($i = 0;$i <=10;$i++)
	{{$i." "}}
@endfor
</br>
<b>Câu lệnh foreach-continue-break</b>
</br>
<?php $khoahoc = array('PHP','IOS','ANDROID','ASP');?>
@foreach($khoahoc as $value)
	@continue($value=='PHP')
	@break($value=='ANDROID')
	{{$value}}
@endforeach
</br>
<b>Câu lệnh forelse</b>
</br>
@forelse($khoahoc as $value)
	{{$value}}
@empty
	{{"Mảng rổng"}}
@endforelse
@endsection()