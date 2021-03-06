<form action="{{url('mail')}}" method="post">
	@csrf
	<button>Send mail</button>
</form>