<form action="{{route('postFormAlias')}}" method="get" accept-charset="utf-8">
	{{csrf_field()}}
	<input type="text" style="background-color:blue" name="HoTen"/>
	<input type="text" name="Tuoi" placeholder="Tuoi">
	<input type="submit" name="Submit"/>
</form>