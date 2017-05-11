<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Option;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('blogs.create', compact('tags'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $data['user_id'] = Auth::user();
        $data['title'] = $request->get('title');
        $data['content'] = $request->get('content');
        $data['publish-on'] = $request->get('publish-on');
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('public/images');
            $filename = str_replace('public/images/', '', $path);
            $data['avatar'] = $filename;
        }
        $data['slug']=str_slug($request->get('title'));
        $blog = Blog::create($data);
        $blog->tags()->attach($request->get('tags'));
        return redirect('allblogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $tags = Tag::all();
        $blog = Blog::where('slug',$slug)->first();
        return view('blogs.edit', compact('blog', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Blog::find($id);
        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->save();
        $post->tags()->sync($request->tags);
        return redirect('allblogs');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Blog::find($id)->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);

    }
    public function singleBlog($slug)
    {
        $singleBlog = Blog::where('slug',$slug)->first();
        $nextBlog=Blog::where('id','>',$singleBlog->id)->min('id');
        $prevBlog=Blog::where('id','<',$singleBlog->id)->max('id');
        return view('blogs.single')
                        ->with('singleBlog',$singleBlog)
                        ->with('next',$nextBlog)
                        ->with('prev',$prevBlog);
    }
    public function addelemnt()
    {
        return view('addelemnts');
    }
    public function storeoptions(Request $r)
    {
        $elements=$r->input('options');
        /*dd($elements);*/
        for ($i=0;$i<count($elements);$i++)
        {
            $ansers= new Option;
            $ansers->options= $elements[$i];
            $ansers->save();

        }
        return redirect()->back();
    }

}
