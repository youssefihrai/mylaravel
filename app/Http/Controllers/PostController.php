<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Image;
use Illuminate\Http\Request;
use App\Post;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{




public function __construct()
{
 

    public function index()
    {
   return view('post.index',[
                     "posts"=>Post::most()->with(['tags'])->take(5)->get(),

          'tab'=>"list"
        ]);

    }

    public function indexPost()
    {
   return view('post.indexpost',[
                     "posts"=>Post::with(['entreprise',])->get(),
          'tab'=>"list"
        ]);

    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function archive()
    {
     
        return view('post.index',[
            "posts"=>Post::onlyTrashed()->withCount('comments')->get()
            ,'tab'=>"archive"

        ]);

    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
     
        return view('post.index',[
            "posts"=>Post::withTrashed()->withCount('comments')->get(),
            'tab'=>"all"

        ]);

    }







    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //cette méthode  à le  but  d'appeler la vue add   qui existe dans le dossier post
    public function create()
    {
     
            return view('post.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*la deuxieme   méthode qui sert a  inserr  les donnés qui sont envoyer par
    formulaire  dans post/add

    */
    public function store(StorePost $request)
    {

          $has_file=$request->hasFile('picture');
          $path_image=$request->file('picture');

        $data=$request->only('title','content');
        $data['slug']=Str::slug($data['title'],'-');
        $data['active']=false;
        $data['entreprise_id'] = Auth::guard('entreprise')->user()->id;
        $post=Post::create($data);
        if($request->hasFile('picture')) {

            $path = $request->file('picture')->store('hhh');

            //$image = new Image(['path' =>  $path]);

            $post->image()->save(Image::make(['path' => $path]));
        }

        return redirect()->route('Post.show',['Post'=>$post->id]);

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       /* $showpost=Cache::remember("show-post{$id}", 60, function () use ($id) {
         
        return view('post.show',[
            "post"=>  Post::with(['comments','tags','entreprise'])->findOrFail($id)//eager
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //cette  méthode sert  à afficherr les donnés sélectionner avant de l'envoyer
    // à la méthode update pour la  moddifier
    public function edit($id)
    {
       $post=Post::findOrfail($id);
   //    $this->authorize("update",$post);
       return view('post.edit',[
           'post'=>$post
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // cette méthode pour modifer les donnés
    public function update(StorePost $request, $id)
    {

        $post=Post::findOrfail($id);
    

        if($request->hasFile('picture')){
            $path_image=$request->file('picture')->store('posts');
            if($post->image){
                 Storage::delete($post->image->path);
                $post->image->path=$path_image;
                 $post->image->save();
                }
                else{
                    /*  $=new Image(['path'=>$path_image]);
                       $post->image()->save($image);*/
                       $post->image()->save(new Image(['path'=>$path_image]));
        }
        }
        $post->title=$request->input('title');
        $post->content=$request->input('content');
        $post->title=Str::slug($request->input('title'),'-');
        $post->save();
        return redirect()->route('Post.show',['Post'=>$post->id]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        // Post::destroy($id);
        return redirect()->route('Post.index');
    }
    public function restore($id){
        $post = Post::onlyTrashed()->where('id',$id)->first();
        $post->restore();
        return redirect()->back();
    }
    public function forcedelete($id){
        $post = Post::onlyTrashed()->where('id',$id)->first();
        $post->forcedelete();
        return redirect()->back();
    }
}
