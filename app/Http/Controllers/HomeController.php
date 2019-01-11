<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function search(Request $request)
    {
        $searchResults = (new Search())
            ->registerModel(User::class, 'name')
            ->registerModel(Role::class, 'name')
            ->perform($request->input('query'));
        dd($searchResults);
    }
}
