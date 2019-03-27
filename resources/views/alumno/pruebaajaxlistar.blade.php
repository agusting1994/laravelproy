<ul>
	@foreach ($users as $user)
		<li>{{ $user->nombre }}</li>
	@endforeach
</ul>