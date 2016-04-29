@extends('layouts.masterback')

@section('sidebar')
<ul>
    <li><a href="{{url('/post')}}">Dashboard</a></li>
    <li><a href="{{url('/post/create')}}">Ajouter une conférence</a></li>
</ul>
@endsection

@section('content')

<h2>Créer un post</h2>
@if(Session::has('message'))
	<p>{{ Session::get('message') }}</p>
@endif

<form action="{{url('post', $post->id)}}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	<input type="hidden" name="_method" value="PATCH">
	<input type="hidden" name="user_id" value="{{$userId}}">

	<p>
		<label for="titre">Titre</label><br>
		<input type="text" name="title" id="titre" placeholder="Votre titre" value="{{$post->title}}">
	</p>
	@if($errors->has('title'))
		<span class="error">{{ $errors->first('title') }}</span>
	@endif

	<p>
		<label for="content">Contenu</label><br>
		<textarea name="content" id="content" placeholder="Votre contenu">{{ $post->content }}</textarea>
	</p>
	@if($errors->has('content'))
		<span class="error">{{ $errors->first('content') }}</span>
	@endif

	<p>
		<label for="name">Nom de l'image</label>
		<input type="text" name="name" id="name">
	</p>
	<p>
		<label for="picture">Télécharger une image</label><br>
		<input type="file" name="picture" id="picture">
	</p>
	@if($errors->has('picture'))
		<span class="error">{{ $errors->first('picture') }}</span>
	@endif

	

	<p>
		<label for="category">Choisir une catégorie</label><br>
		<select name="category_id" id="category">
			@foreach($categories as $id => $title)
				<option value="{{$id}}" {{$post->category_id==$id? 'selected' : ''}}>{{ $title }}</option>
			@endforeach
		</select>
	</p>
	@if($errors->has('category_id'))
        <span class="error">{{ $errors->first('category_id') }}</span>
    @endif

	<p>
		<label for="tags">Choisir un tag</label><br>
		<select name="tag_id[]" id="tags" multiple>
			@foreach($tags as $id => $name)
				<option value="{{$id}}" {{$post->hasTag($id)? 'selected' : ''}}>{{ $name }}</option>
			@endforeach
		</select>
	</p>
	@if($errors->has('tag_id'))
        <span class="error">{{ $errors->first('tag_id') }}</span>
    @endif

    <p>
    	<label for="statut">Publier l'article</label><br>
    	<input type="checkbox" name="status" id="statut" value="opened" {{$post->status=='opened'? 'checked' : ''}}>
    </p>

    <p><input type="submit" value="Valider"></p>
	
</form>

@endsection