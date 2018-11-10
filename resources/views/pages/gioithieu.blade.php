@extends('pages.master')
@section('body')
	<div class="col-md-8 paddingtop">
		<h3 title="">
			@if (isset($title))
				{{$title}}
			@endif
		</h3>
		<hr>
		@if (isset($content_html))
			{!!$content_html!!}
		@endif
	</div>
@endsection