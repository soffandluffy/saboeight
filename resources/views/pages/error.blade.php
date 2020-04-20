@if($errors->any())
	@php
		alert()->error('Error', $errors->first());
	@endphp
@endif