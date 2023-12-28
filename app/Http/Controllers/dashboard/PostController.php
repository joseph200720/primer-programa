<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;


use App\Models\Post;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Category::find(1)->posts);
        //return route('Post.create');
        //return redirect('/Post/create');
       // return redirect()->route('post.create');
        
        
        

        $posts = Post::paginate(2);
        
        return view('dashboard.post.index', compact('posts'));
        
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$categories = Category::pluck('id', 'title');

        $post = new Post(); 

        

         
        //dd($categories);

        echo view('dashboard.post.create', compact('categories', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //echo request("title");
        //echo $request->input('slug');

        //$validate= $request->validate(StoreRequest::myRules());

        //$validated = Validator::make($request->all(),StoreRequest::myRules());

        //dd($validated->errors());
        //dd($validated->fails());

        

        //$data = array_merge($request->all(),['image'=>'']); 
        
        //dd($data);

       // $data = $request->validated();

        //$data ['slug']= Str::slug($data['title']);

        //dd($data);
        

        Post::create($request->validated());
        return redirect()->route('post.index')->with('status',"Registro creado");
        
        $validatedData['category_id'] = $request->input('category_id');
        Post::create($validatedData);

    }

    /**
     * Display the specified resource.
     * 
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //echo "show";

        return view('dashboard.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       //$categories = Category::pluck('id', 'title');
       $post = Post::find($id);

       echo view('dashboard.post.edit',compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response 
     */
    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();
        if( isset($data["image"])){
            $data["image"] = $filename = time().".".$data["image"]->extension();

            $request->image->move(public_path("image"),$filename);
        }

        $post->update($data);
        //$request->session()->flash('status',"Registro actualizado");
        $post->slug = $request->input('slug');

        return redirect()->route('post.index')->with('status',"Registro actualizado");
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //echo "destroy";
        $post->delete();
        return redirect()->route('post.index')->with('status',"Registro eliminado");
    }
}
