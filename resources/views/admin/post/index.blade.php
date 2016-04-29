@extends('layouts.masterback')

@section('sidebar')
<ul>
    <li><a href="{{url('/post')}}">Dashboard</a></li>
    <li><a href="{{url('/post/create')}}">Ajouter une conférence</a></li>
</ul>
@endsection

@section('content')

<h2>Dashboard</h2>

<p class="maj">Mise à jour réussie</p>

{{ $posts->links() }}

<table>
	<tr>
		<th>id</th>
		<th>statut</th>
		<th>titre</th>
		<th>auteur</th>
		<th>date début et fin</th>
		<th>catégorie</th>
		<th>mot clés</th>
		<th>changer le statut</th>
		<th>supprimer</th>
	</tr>

	@foreach($posts as $post)
		<tr>
			<td>{{ $post->id }}</td>
			<td>{{ $post->statut }}</td>
			<td><a href="{{url('post', [$post->id, 'edit'])}}">{{ $post->title }}</a></td>
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
			<td><button class="statut">unpublish</button></td>
			<td>
				<form action="{{url('post', $post->id)}}" method="post">
					<input type="hidden" name="_method" value="DELETE">
					{{ csrf_field() }}
					<button type="submit" value="delete" class="supprimer">supprimer</button>
				</form>
			</td>
		</tr>
	@endforeach
</table>

@endsection