@extends('layouts.layout')

@section('title')
	{{ $package->name }} -
@stop

@section('content')
	<section class="package">
		<section class="package__informations">
			<h1>{{ $package->name }} <small>by {{ $package->maintainersList }}</small></h1>
			@include('partials.package-summary')
		</section>
		<h2>Versions</h2>
		@foreach ($package->versions as $version)
			<article class="package__version">
				<h3>
					{{ $version->version }}
					<time datetime="{{ $version->created_at }}">{{ $version->created_at->diffForHumans() }}</time>
				</h3>
				<code>
					<pre>"{{ $package->name }}": "{{ $version->version }}"</pre>
				</code>
			</article>
		@endforeach
		@if (!$similar->isEmpty())
			<h2>Similar packages</h2>
			@foreach ($similar as $package)
				<article class="maintainer__package">
					<h3>
						{{ HTML::linkAction('PackagesController@package', $package->name, $package->slug) }}
						<small>
							last updated
							<time datetime="{{ $package->pushed_at }}">{{ $package->pushed_at->diffForHumans() }}</time>
						</small>
					</h3>
					@include('partials.package-summary')
				</article>
			@endforeach
		@endif
	</section>
@stop
