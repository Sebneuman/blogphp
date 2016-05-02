@extends('layouts.masterback')

@section('sidebar')
<ul>
    <li><a href="{{url('/post')}}">Dashboard</a></li>
    <li><a href="{{url('/post/create')}}">Ajouter une conférence</a></li>
</ul>
@endsection

@section('content')

<h2>Dashboard</h2>

<div class="pagin">{{ $posts->links() }}</div>

@if(Session::has('message'))
    <p class="maj">{{Session::get('message')}}</p>
@endif

<table>
	<thead>
		<tr>
			<th>numéro</th>
			<th>statut</th>
			<th>titre</th>
			<th>auteur</th>
			<th>date de création</th>
			<th>catégorie</th>
			<th>mot clés</th>
			<th>publier</th>
			<th>modifier</th>
			<th>supprimer</th>
		</tr>
	</thead>

    <div id="confirm" title="Vider l'article ?">
        <p><span class="ui-icon ui-icon-alert" style="float:left; margin:3px 7px 20px 0;"></span>Confirmez vous la suppression de l'article «&nbsp;<span></span>&nbsp;» ?</p>
    </div>

	@forelse($posts as $post)
		<tr>
			<td>{{ $post->id }}</td>
			<td {{$post->status==='opened'? 'class=ouvert' : 'class=ferme'}}>{{ $post->status }}</td>

			<td><a href="{{url('article', [$post->id])}}">{{ $post->title }}</a></td>
			<td>{{ $post->user? $post->user->name : 'aucun auteur' }}</td>
			<td>{{ $post->created_at }}</td>
			<td>
				@if($category = $post->category)
					{{ $category->title }}
				@endif
			</td>
			<td>
				@if($tags = $post->tags)
					@foreach($tags as $tag)
						{{ $tag->name }}
					@endforeach
				@endif
			</td>
			<td id="publier">
				@if($post->status === 'opened')
                    <a href="{{action('PostController@published', $post)}}" class="btn publier">dé-publier</a>
                @else
                    <a href="{{action('PostController@published', $post)}}" class="btn publier">publier</a>
                @endif
			</td>
			<td><a href="{{url('post', [$post->id, 'edit'])}}" class="btn modifier">modifier</a></td>
			<td>
				<form class="destroy" method="POST" action="{{url('post', $post->id)}}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input type="hidden" name="title_h" value="{{$post->title}}">
                    <input class="btn supprimer" name="delete" type="submit" value="supprimer">
                </form>
			</td>
		</tr>
	@empty
		<p>Il n'y a aucun article en base</p>
	@endforelse
</table>

<div class="pagin">{{ $posts->links() }}</div>

@endsection