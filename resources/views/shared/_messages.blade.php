@foreach (['danger', 'warning','success', 'info'] as $msg)
	{{-- expr --}}
	@if (session()->has($msg))
		{{-- expr --}}
		<div class="flash-message">
			<p class="alert alert-{{ $msg }}">
				{{ session()->get($msg)}}
				
			</p>
				
			
		</div>
	@endif
@endforeach