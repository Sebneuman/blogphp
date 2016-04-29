@extends('layouts.master')

@section('content')

<div class="pagination"></div>

<h2>Titre de l'article {{ $posts->title }}</h2>

<p>Extrait {{ $posts->excerpt(10) }}<a href="">Lire la suite...</a></p>

@if($tags = $posts->tag)
	<div>Tags :
		<ul>
			@foreach($tags as $tag)
				<li>{{ $tag->name }}</li>
			@endforeach
		</ul>
	</div>
@endif

@if($category = $posts->category)
<p>Dans la catégorie : {{ $category->title }}</p>
@endif

@if($picture = $posts->picture)
	<p>{{ $posts->picture }}</p>
@endif

<div class="pagination"></div>

@endsection

@section('sidebar')
<h2>Titre</h2>
<ul>
    <li><a href="">Sponsor 1</a></li>
    <li><a href=""></a></li>
    <li><a href=""></a></li>
    <li><a href=""></a></li>
    <li><a href=""></a></li>
    <li><a href=""></a></li>
</ul>
@endsection