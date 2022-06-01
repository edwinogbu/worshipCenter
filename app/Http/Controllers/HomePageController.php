<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\About;
use App\Models\Comment;
use App\Models\Profile;
use App\Models\Category;
use App\Models\Testimony;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\DeclarationCategory;
use App\Models\NoticeBoard;
use App\Models\NoticeBoardCategory;
use App\Models\PropheticDeclaration;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    //

    public function homePage(Request $request, Blog $blog)
    {
        // dd($blog);

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
        $noticeBoardCategories = NoticeBoardCategory::all();
        $noticeBoards = NoticeBoard::all();
        $noticeBoards = NoticeBoard::whereNotNull('notice_board_category_id')->latest()->paginate(1);
        // $noticeBoards = NoticeBoard::whereNotNull('notice_board_category')->orderBy('notice_board_category_id', 'desc')->get()->groupBy('notice_board_category_id');
        // $noticeBoards = NoticeBoard::with('noticeBoardCategory')->whereNotNull('notice_board_category_id')->orderBy('notice_board_category_id', 'DESC')->latest()->first()->get();
        // $noticeBoardCategories = NoticeBoardCategory::with('noticeBoard')->orderBy('created_at', 'DESC')->latest()->first()->get();
        // $NoticeBoards = NoticeBoard::with('noticeBoardCategory')->orderBy('created_at', 'DESC')->latest()->first()->get();
        // $noticeBoards = NoticeBoard::whereNotNull('notice_board_category_id')->orderBy('notice_board_category_id', 'desc')->get()->groupBy('notice_board_category_id');
    //    foreach ($noticeBoards as $value) {
    //        # code...
    //        dd($value);
    //    }

        // $users = User::all();
        // $profile = Profile::all();
        // $profile= Profile::where('user_id', Auth::user()->id)->latest()->paginate(1);

// dd($users);
        return view('welcome', compact('blogs', 'weeks', 'recent',
                                        'immediate','categories', 'testimonies',
                                        'declarationCategory','propheticDeclarations',
                                        'propheticDeclaration',
                                        'noticeBoards',
                                        'noticeBoardCategories',
                                        // 'users',
                                        // 'profile'
                                    ));
    }


    public function getViewPost($id)
    {
        // dd($id);
        $post=Blog::find($id);
        $post->increment('view_count');

        return view('/', compact('post'));

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


    public function status(Request $request, $id)
    {
        $blog=Blog::find($id);
        // $blog->status =$request->status;
        $blog->status =$request->boolean('status');
        $blog->save();
        Toastr::info('status changed successfully :)','info');

        return redirect()->back()->with('success', 'post has been updated successfully');
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
