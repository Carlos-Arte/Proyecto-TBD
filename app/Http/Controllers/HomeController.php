<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       /* $users =DB::connection('mariadb')->table('users')->get();
        $users2 =DB::connection('mariadb02')->table('users')->get();

        $user = $users->merge($users2);

        return view('index', ['usuarios' => $user]);*/
    }
}
