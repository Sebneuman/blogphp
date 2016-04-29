<?php

namespace App\Http\Controllers;

use Auth;
use App\Tag;
use App\Post;
use App\Picture;
use App\Category;
use App\Http\Requests;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category', 'tags', 'user')->paginate(10);

    	return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('title', 'id');
        $tags = Tag::lists('name', 'id');
        $userId = Auth::user()->id;
        //$post = new Post;

        return view('admin.post.create', compact('categories', 'tags', 'userId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create($request->all());

        if(!empty($request->input('tag_id')))
        {
            $post->tags()->attach($request->input('tag_id'));
        }

        $im = $request->file('picture');

        if(!empty($im))
        {
            $this->upload($im, $request->input('name'), $post->id);
        }

        return redirect('post')->with('message', 'success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::lists('title', 'id');
        $tags = Tag::lists('name', 'id');
        $userId = Auth::user()->id;

        return view('admin.post.edit', compact('post', 'categories', 'tags', 'userId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());

        if(!empty($request->input('tag_id')))
        {
            $post->tags()->sync($request->input('tag_id'));
        }

        if(!empty($im))
        {
            $this->deletePicture($post);
            $this->upload($im, $post->id);
        }

        return redirect('post')->with('message', 'success');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $title = $post->title;
        $post->delete();

        return redirect('post')->with(['message' => sprintf('success delete resource %s', $title)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upload($im, $name, $postId)
    {        
        $ext = $im->getClientOriginalExtension(); // extension du fichier

        $uri = str_random(50) . '.' . $ext;

        Picture::create([
            'name' => $name,
            'uri' => $uri,
            'size' => $im->getSize(),
            'mime' => $im->getClientMimeType(),
            'post_id' => $postId
        ]);

        // exception levé par le framework si pb
        $im->move(env('UPLOAD_PICTURES', 'uploads'), $uri);

        return true;
    }


    public function deletePicture(Post $p)
    {
    	if(!is_null($p->picture))
        {
            $fileName = public_path('uploads') . DIRECTORY_SEPARATOR . $p->picture->uri;

            if(File::exists($fileName))
            {
                File::delete($fileName);
            }

            $p->picture->delete();

            return true;
        }

        return false;
    }
}
