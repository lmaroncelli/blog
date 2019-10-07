<?php

namespace App\Http\Controllers;

use App\Article;
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
        $articoli = Article::orderBy('updated_at', 'desc')->get();
        return view('home', compact('articoli'));
    }



    public function search(Request $request)
      {
				$articoli = Article::where('titolo','like','%'.$request->get('q').'%')->orWhere('corpo','like','%'.$request->get('q').'%')->get();
				return view('home', compact('articoli'));
				return $articoli;
			}


}
