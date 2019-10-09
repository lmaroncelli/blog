<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Article;
use App\Category;
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

      $categorie = Category::orderBy('nome')->get();
      $categorie_assegnate_ids = []; 

      return view('admin.articolo.form', compact('articolo','categorie','categorie_assegnate_ids'));

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

      $articolo = Article::create($request->except('categorie'));

      $articolo->categorie()->sync($request->categorie);  

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
        $articolo = Article::find($id);

        return view('admin.articolo.view', compact('articolo'));
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

       $categorie = Category::orderBy('nome')->get();
       $tags = Tag::orderBy('nome')->get();

       $categorie_assegnate_ids = $articolo->categorie()->pluck('tblCategorie.id')->toArray(); 
       $tags_assegnati_ids = $articolo->tags()->pluck('tblTags.id')->toArray(); 

       return view('admin.articolo.form', compact('articolo','categorie','categorie_assegnate_ids','tags','tags_assegnati_ids'));
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

        $articolo->fill($request->except('categorie'))->save();

        $articolo->categorie()->sync($request->categorie);
        
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
        dd('elimina articolo '.$id);
    }
}
