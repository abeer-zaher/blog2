<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;


class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $post = Post::all();
       // $user = Auth::id();
        return view('posts.index',compact('post')) ;
         
     
    }

    
    public function trash()
    {
        $post = Post::onlyTrashed()->get();
        return view('posts.trash',compact('post'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $tags = Tag::all();
        return view('posts.create',compact('tags'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'photo'=>'required|image',
             'tags'=>'required'
             
            ]);
            $photo = $request->photo;
            $newPhoto = time().$photo->getClientOriginalName();
            $photo->move('uploads/posts',$newPhoto);

            $post = Post::create([
                'user-id'=>Auth::id(),
                'title'=>$request->title,
                'content'=>$request->content,
                'slag'=>$request->title,
                'photo'=>'uploads/posts/'.$newPhoto

             ]);
          
           
            $post->tags()->attach($request->tags);
        
            return redirect()->back();
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show( $salg)
    {
        $post = Post::where('slag', $salg)->first();

        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         
        $post = Post::find($id);

        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         
        $post = Post::find($id);
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            
            ]);

            if($request->has('photo')){
                $photo = $request->photo;
                $newPhoto = time().$photo->getClientOriginalName();
                $photo->move('uploads/posts',$newPhoto);
                $post->photo = 'uploads/posts'.$newPhoto;
 
            }

            $post->title = $request->title;
            $post->content = $request->content;
            $post->save();
            return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();
    }
  /**   public function hardDelete($id){
       * $post = Post::withTrashed()->where('id',$id)->first();
        *$post->forecDelete();
        *return redirect()->back();
  
      *}*/
  
      public function restore($id)
      {
          $post = Post::withTrashed()->where('id',$id)->first();
          $post->restore();
          return redirect()->back();
  
      }
}
