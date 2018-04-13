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

    public function showChangePasswordForm(){
        return view('auth.changepassword');
    }

    public function changePassword(Request $request){
 
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
 
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect('dashboard')->with("success","Password changed successfully !");
    }

    public function slider(){
        $homeSlider = HomeSlider::get()->first();
        return view('dashboard.sliders')->with('homeSlider',$homeSlider);
    }
}
