<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\User;
use App\Role;
use\App\Subscriber;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //Only allow registered users to create new users.
       // $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'string|max:50',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //Only an Administrator can create new users.
       // auth()->user()->authorizeRoles(['administrator']);
        //Crete a new User.
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
          ]);
          // Add new user role.
          if(!Auth::guest() && auth()->user()->authorizeRoles(['administrator'])){
            $user
            ->roles()
            ->attach(Role::where('name', $data['role'])->first());
            return auth()->user();
          }
          else{
            $user
            ->roles()
            ->attach(Role::where('name','user')->first());
            if (array_get($data, 'subscribe', false)){
                $subscriber        = new Subscriber;
                $subscriber->email = $data['email'];
                $subscriber->save();
            }
          }
         return $user;
    }
}
