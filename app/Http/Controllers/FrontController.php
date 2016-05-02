<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use App\Http\Requests;
use Illuminate\Http\Request;


class FrontController extends Controller
{
	private $paginate = 10;


    public function index(Request $request){

    	$title = "Blog PHP";
    	$posts = Post::with('category', 'user', 'tags', 'picture')->paginate($this->paginate);
    	
        return view('front.index', compact('title', 'posts'));
    }


    public function show($id)
    {
    	$post = Post::findOrFail($id);
        $title = 'Article : ' . $post->title;

    	return view('front.show', compact('title', 'post'));
    }


    public function showPostByUser($id)
    {
    	$user = User::findOrFail($id);
    	$posts = $user->posts;
    	$name = $user->name;
        $title = "Articles de l'auteur $name";

    	return view('front.user', compact('title', 'posts', 'name'));
    }


    public function showPostByCat($id)
    {
    	$category = Category::findOrFail($id);
    	$posts = $category->posts()->published()->get();
        $name = $category->title;
        $title = "Articles de la catégorie {$category->title}";

    	return view('front.category', compact('title', 'posts', 'name'));
    }

}
