<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\User;
use App\PCategory;
use App\Product;
use App\Post;
use App\Subscriber;
use App\HomeSlider;
use App\BeforenAfter;
use App\Gallery;
use App\treatmentType;
use App\treatment;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('dashboard.index', compact('user'));
    }

    public function posts()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        //IF USER IS ADMINISTRATOR OR MANAGER CAN SEE ALL THE POSTS
        if(auth()->user()->hasRole('administrator') !=null || auth()->user()->hasRole('manager') !=null){
            return view('dashboard.posts')->with('posts',Post::all());
        }
        // ELSE USER ONLY CAN SEE HIS POSTS
        else{
            return view('dashboard.posts')->with('posts',$user->posts);
        }
        
    }

    public function subscribers()
    {
     $subscribers = Subscriber::orderby('created_at','desc')->paginate(20);
     return view('dashboard.subscribers')->with('subscribers',$subscribers);
    }

    public function products()
    {
        auth()->user()->authorizeRoles(['administrator', 'manager']); 
        $products = Product::orderby('p_category_id')->paginate(20);
        return view('dashboard.products')->with('products',$products); 
    }

    public function categories()
    {
        auth()->user()->authorizeRoles(['administrator', 'manager']); 
        $categories = PCategory::all();
        return view('dashboard.categories')->with('categories',$categories);
    }
  
    public function users()
    {
     $users=User::all();
     $countUsers=0;
     return view('dashboard.users')->with('users',$users)->with('countUsers',$countUsers);
    }
    
    public function slider(){
        $homeSlider = HomeSlider::get()->first();
        return view('dashboard.sliders')->with('homeSlider',$homeSlider);
    }
    public function before_n_after(){
        $BnASliders = BeforenAfter::all();
        return view('dashboard.before_n_after')->with('BnASliders',$BnASliders);
    }

    public function gallery(){
        $gallery = Gallery::all();
        return view('dashboard.gallery')->with('gallery',$gallery);
    }
    public function treatmenttypes(){
        $treatmenttypes = TreatmentType::all();
        return view('dashboard.treatmenttype')->with('treatmenttypes',$treatmenttypes);
    }
    public function treatments(){
        $treatments = Treatment::orderby('created_at','desc')->paginate(10);;
        return view('dashboard.treatment')->with('treatments',$treatments);
    }
}
