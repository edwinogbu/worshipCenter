<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\About;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Testimony;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DeclarationCategory;
use App\Models\PropheticDeclaration;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Support\Facades\Redirect;


class BlogController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $start=Carbon::now()->subWeek()->startOfWeek();
        $end=Carbon::now()->subWeek()->endOfWeek();

        $posts=Blog::orderBy('id', 'desc')->paginate(5);
        $recent=Blog::orderBy('id', 'desc')->paginate(3);
        $immediate=Blog::orderBy('id', 'desc')->paginate(1);
        $categories = Category::all();
        $weeks= Blog::whereBetween('created_at', [$start, $end])->take(3)->get();

        return view('blog.index', compact('posts', 'recent', 'immediate','weeks','categories'));

    }
    public function post_dashboard()
    {


        $start=Carbon::now()->subWeek()->startOfWeek();
        $end=Carbon::now()->subWeek()->endOfWeek();

        $posts=Blog::orderBy('id', 'desc')->paginate(5);
        $recent=Blog::orderBy('id', 'desc')->paginate(3);
        $immediate=Blog::orderBy('id', 'desc')->paginate(1);
        $categories = Category::all();
        $weeks= Blog::whereBetween('created_at', [$start, $end])->take(3)->get();

        return view('dashboard.blog.index', compact('posts', 'recent', 'immediate','weeks','categories'));
    }

    public function getViewPost($id)
    {
        // dd($id);
        $post=Blog::find($id);
        $post->increment('view_count');

        return view('/', compact('post'));

    }

    public function homePage(Request $request, Blog $blog)
    {
        // dd($request);

    //    $view_counts= DB::table('blogs')->where('id', $blog->id)->increment('view_count');
        // $view_counts= Blog::find($id);
        // $view_counts->increment('view_count');

        $blogs=Blog::orderBy('id', 'desc')->paginate(3);
        $recent=Blog::orderBy('id', 'desc')->paginate(3);
        $immediate=Blog::orderBy('id', 'desc')->paginate(1);

        $start=Carbon::now()->subWeek()->startOfWeek();
        $end=Carbon::now()->subWeek()->endOfWeek();
        $categories = Category::all();

        $testimonies = Testimony::all();

        $weeks= Blog::whereBetween('created_at', [$start, $end])->take(3)->get();

        $declarationCategory =DeclarationCategory::all();
        $propheticDeclarations = PropheticDeclaration::all();

        $propheticDeclaration = PropheticDeclaration::all();

        return view('welcome', compact('blogs', 'weeks', 'recent',
                                        'immediate','categories', 'testimonies',
                                        'declarationCategory','propheticDeclarations','propheticDeclaration'));
    }

    public function singlePage(Request $request, Blog $blog)
    {
        // dd($request);
        // $blogs=Blog::orderBy($id)->first();
        $view_counts= DB::table('blogs')->where('id', $blog->id)->increment('view_count');

        $comments=Comment::all();

        $start=Carbon::now()->subWeek()->startOfWeek();
        $end=Carbon::now()->subWeek()->endOfWeek();
        $categories = Category::all();

        $weeks= Blog::whereBetween('created_at', [$start, $end])->take(3)->get();
        $recent=Blog::orderBy('id', 'desc')->paginate(3);
        $immediate=Blog::orderBy('id', 'desc')->paginate(1);

        $blogs=Blog::all();

        return view('blog.single', compact('blogs','blog', 'view_counts', 'comments', 'weeks', 'recent', 'immediate','categories'));
    }


    public function userComment(Request $request, Blog $blog)
    {
        // dd($request);
        $input['from_user'] = $request->user()->id;
    //   $input['user_image'] = $request->user()->picture;
      $input['on_blog'] = $request->input('on_blog');
      $input['body'] = $request->input('body');
      $slug = $request->input('slug');
      Comment::create( $input );

        return view('blog.single', compact('blogs','blog', 'view_counts'));
    }




    public function aboutPage(Request $request, About $about)
    {
        // dd($request);
        // $blogs=Blog::orderBy($id)->first();
        $about=About::all();
        return view('blog.about', compact('about'));
    }
    public function topWeekStory(Request $request)
    {
        $start=Carbon::now()->subWeek()->startOfWeek();
        $end=Carbon::now()->subWeek()->endOfWeek();
        $weeks= Blog::whereBetween('created_at', [$start, $end])->take(3)->get();
        $blogs=Blog::orderBy('id', 'desc')->paginate(5);
        // dd($weeks);

        return view('welcome', compact('week','blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::first();
        $categories =Category::orderBy('id', 'desc')->paginate(20);

        return view('dashboard.blog.create', compact('category', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $path =$request->file('picture')->store('public/images');

            $posts= new Blog;
            $posts->category_id=$request->category_id;
            $posts->title=$request->title;
            $posts->author=$request->author;
            $posts->body=$request->body;
            $posts->picture=$path;
            $posts->save();

        // $posts=Blog::create([
        //     'title'=>$request->title,
        //     'author'=>$request->author,
        //     'body'=>$request->body,
        //     'picture'=>$path
        // ]);

        Toastr::success('post created successfully :)','success');

        return redirect()->route('user.post.index')->with('success', 'post has been created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $id)
    {
        $blog=Blog::find($id);
        // $blog->status =$request->status;
        $blog->status =$request->boolean('status');
        $blog->save();
        Toastr::info('status changed successfully :)','info');

        return redirect()->back()->with('success', 'post has been updated successfully');
    }


    public function ChangeStatus(Request $request, $id)
    {
        $blog= Blog::find($id);
        $blog ->status=$request->status;
        $blog->save();
    //    $states= Blog::create([
    //             'status'=>$status,

    //         ]);

            return redirect()->back();

    }

    public function show(Blog $blog)
    {
        return view('blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($blog);
        $category = Category::first();
        $categories =Category::orderBy('id', 'desc')->paginate(20);
        $post = Blog::findOrFail($id);
        return view('dashboard.blog.edit', compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($blog->id);
        $request->validate([
            'category_id'=>'required',
            'title'=>'required',
            'author'=>'required',
            'body'=>'required',

        ]);
        $blog=Blog::find($id);
        if ($request->hasFile('picture')) {
            $request->validate([

                'picture'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path =$request->file('picture')->store('public/images');
            $blog->picture=$path;
        }
            $blog->category_id=$request->category_id;
            $blog->title=$request->title;
            $blog->author=$request->author;
            $blog->body=$request->body;
            $blog->save();


            Toastr::info('post updated successfully :)','info');

        return redirect()->route('user.post.index')->with('success', 'post has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        Toastr::error('post deleted successfully :)','error');

        return redirect()->route('post.index')->with('success', 'post deleted successfully');
    }


    public function StoreFrontendAppointment(Request $request)
    {
        $appointment = new Appointment();
        $appointment->name = $request->name;
        $appointment->gender = $request->gender;
        $appointment->phone = $request->phone;
        $appointment->email = $request->email;
        $appointment->ticket_type = $request->ticket_type;
        $appointment->appointment_type = $request->appointment_type;
        $appointment->address = $request->address;
        $appointment->occupation = $request->occupation;
        $appointment->save();
        Toastr::success('appointment booked successfully :)','success');
        return redirect()->back();
    }
}
