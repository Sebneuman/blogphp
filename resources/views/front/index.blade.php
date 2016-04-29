@extends('layouts.masterfront')

@section('title', $title)

@section('h2')
	<h2>Les articles</h2>
@endsection

@section('content')

<div class="pagination">{{ $posts->links() }}</div>


@foreach($posts as $post)
	<h3><a href="{{url('article', [$post->id])}}">{{ $post->title }}</a></h3>
	<p>{{ $post->content }} <a href="{{ Action('FrontController@show', $post->id)}}">Lire la suite...</a></p>

	<div>Tags: 
		@if($tags = $post->tags)
			<ul class="tags">
				@foreach($tags as $tag)
					<li>{{ $tag->name }}</li>
				@endforeach
			</ul>
		@endif
	</div>

	@if($category = $post->category)
		<p>Catégorie : {{ $category->title }}</p>
	@endif
@endforeach


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