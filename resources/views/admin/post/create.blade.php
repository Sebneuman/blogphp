@extends('layouts.masterback')

@section('sidebar')
<ul>
    <li><a href="{{url('/post')}}">Dashboard</a></li>
    <li><a href="{{url('/post/create')}}">Ajouter une conférence</a></li>
</ul>
@endsection

@section('content')

<h2>Créer un article</h2>

@if(Session::has('message'))
	<p>{{ Session::get('message') }}</p>
@endif

<form action="{{url('post')}}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	<input type="hidden" name="user_id" value="{{$userId}}">

	<p>
		<label for="titre">Titre</label><br>
		<input type="text" name="title" id="titre" placeholder="Votre titre" value="{{old('title')}}">
	</p>
	@if($errors->has('title'))
		<span class="error">{{ $errors->first('title') }}</span>
	@endif

	<p>
		<label for="content">Contenu</label><br>
		<textarea name="content" id="content" placeholder="Votre contenu">{{ old('content') }}</textarea>
	</p>
	@if($errors->has('content'))
		<span class="error">{{ $errors->first('content') }}</span>
	@endif

	<p>
		<label for="picture">Télécharger une image</label><br>
		<input type="file" name="picture" id="picture">
	</p>
	@if($errors->has('picture'))
		<span class="error">{{$errors->first('picture')}}</span>
	@endif

	<p>
		<label for="category">Choisir une catégorie</label><br>
		<select name="category_id" id="category">
			@foreach($categories as $id => $title)
				<option value="{{$id}}">{{ $title }}</option>
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
				<option value="{{$id}}">{{ $name }}</option>
			@endforeach
		</select>
	</p>
	@if($errors->has('tag_id'))
        <span class="error">{{ $errors->first('tag_id') }}</span>
    @endif

    <p><input type="submit" value="Valider" class="valider"></p>
	
</form>

@endsection