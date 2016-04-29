@extends('layouts.masterfront')

@section('title', $title)

@section('h2')
	<h2><a href="{{url('user', [$post->id])}}">{{ $post->title }}</a></h2>
@endsection

@section('content')

<p>{{ $post->content }}</p>

<div>Tags: 
	@if($tags = $post->tags)
		<ul class="tags">
			@foreach($tags as $tag)
				<li>{{ $tag->name }}</li>
			@endforeach
		</ul>
	@endif
</div>

Auteur: {{ $post->user->name }}

@if($category = $post->category)
	<p>Catégorie : <a href="{{url('category', [$post->id])}}">{{ $category->title }}</a></p>
@endif

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