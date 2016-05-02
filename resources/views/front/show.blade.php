@extends('layouts.masterfront')

@section('title', $title)

@section('h2')
	
@endsection

@section('content')

<div class="post">
	<h2><a href="{{url('user', [$post->id])}}">{{ $post->title }}</a></h2>
	
	@if($picture = $post->picture)
		<p><img src="{{url('uploads', $post->picture->uri)}}" alt=""></p>
	@endif

	<p>{{ $post->content }}</p>

	@if($user = $post->user)
		<p><span class="bld">Auteur :</span> <a href="{{url('user', [$post->id])}}">{{ $user->name }}</a></p>
	@endif

	<p><span class="bld">Mots-clés :</span>
		@if($tags = $post->tags)
			<ul class="tags">
				@foreach($tags as $tag)
					<li>{{ $tag->name }}</li>
				@endforeach
			</ul>
		@endif
	</p>

	@if($category = $post->category)
		<p><span class="bld">Catégorie :</span> <a href="{{url('category', [$post->id])}}">{{ $category->title }}</a></p>
	@endif

	<p><span class="bld">Date de publication :</span> {{ $post->published_at }}</p>
</div>

@endsection

@section('sidebar')
<h2>Les sponsors</h2>
<ul>
    <li><a href=""><img src="../../assets/img/elao_logo_150px.png" alt="Elao"></a></li>
    <li><a href=""><img src="../../assets/img/zol-logo.png" alt="Zol"></a></li>
    <li><a href=""><img src="../../assets/img/logo-large.png" alt="Joli Code"></a></li>
    <li><a href=""><img src="../../assets/img/Elephpant.png" alt="PHP"></a></li>
</ul>
@endsection