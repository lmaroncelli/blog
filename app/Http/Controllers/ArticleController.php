<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articoli = Article::orderBy('updated_at','desc')->get();
        return view('admin.articolo.index', compact('articoli'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $articolo = new Article;

      return view('admin.articolo.form', compact('articolo'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
      $request->validate([
          'titolo' => 'required|unique:tblArticoli|max:255',
          'corpo' => 'required',
      ]);

      Article::create($request->all());


      return redirect()->route('article.index')->with('status', 'Articolo creato!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $articolo = Article::find($id);

       return view('admin.articolo.form', compact('articolo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $request->validate([
            'titolo' => "required|unique:tblArticoli,titolo,$id |max:255",
            'corpo' => "required",
        ]);
        
        $articolo = Article::find($id);

        $articolo->fill($request->all())->save();
        

        return redirect()->route('article.index')->with('status', 'Articolo aggiornato!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
