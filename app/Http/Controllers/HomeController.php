<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Resources\ArticleResource;
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
        //$articoli = Article::orderBy('updated_at', 'desc')->get();

        return view('home');
    }


    // We return with a JSON response, because we want to retrieve it from our front-end.
    // That also means we should use API routes here and not the normal web routes, but it’s secondary now.
    public function search(Request $request)
      {
        
        $articoli = Article::where('titolo','like','%'.$request->get('keywords').'%')->orWhere('corpo','like','%'.$request->get('keywords').'%')->get();
        
        return ArticleResource::collection($articoli);
        
      }
      
    

      public function showArticolo(Request $request, $id)
        {
          $articolo = Article::find($id);
          return view('show_articolo', compact('articolo'));
        }


}
