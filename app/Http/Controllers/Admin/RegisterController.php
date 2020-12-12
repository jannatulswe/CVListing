<?php

namespace App\Http\Controllers\Admin;

use App\Candidate;
use App\Employer;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{


    use RegistersUsers;

    public function showRegistrationForm()
    {
        return view('admin.auth.register');
    }


    protected $redirectTo = '/admin/home';


    public function __construct()
    {
        $this->middleware('guest:admin');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:employers'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }



    protected function create(array $data)
    {
        return Employer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => rand(1, 10),
        ]);
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        Auth::guard('admin')->login($user);

        return $this->registered($request, $user)
            ?: redirect('/admin/home');
    }
}
