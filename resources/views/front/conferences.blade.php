@extends('layouts.masterfront')

@section('title', $title)

@section('content')

<h2>Les articles de {{ $name }}</h2>

@foreach($posts as $post)
	<div class="post">
		<h3><a href="{{url('article', [$post->id])}}">{{ $post->title }}</a></h3>
		
		<p>{{ $post->content }} <a href="{{ Action('FrontController@show', $post->id)}}">Lire la suite...</a></p>

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
@endforeach

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