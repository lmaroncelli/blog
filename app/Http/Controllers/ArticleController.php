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
     * Le ctagorie possono essere create, quindi
      "categorie" => array:2 [▼
                0 => "4"
                1 => "dsdsd"
              ]
      se il valore è un ID allora è una categoria che esiste
      se il valore è una stringa è UNA NUOVA CATEGORIA da CREARE
     *
     * @param array $categorie
     * @return void
     */
    private function _manage_categorie(&$request)
      {
      if (count($request->categorie)) 
        {
        $request_categorie = $request->categorie;

        foreach ($request_categorie as $key => $value) 
          {
          if(!is_numeric($value))
            {
            // creo la nuova categoria e sostituisco nella request il nome con l?ID in modo che quando faccio il syncronize() 
            // per assegnate le categorie all'articolo funizona
            $new_cat = Category::create(['nome' => $value]);
            $request_categorie[$key] = $new_cat->id;
            }
          }
        $request->merge(['categorie' => $request_categorie]);    
        }
      }
    

      /**
       * vedi _manage_categorie
       *
       * @param [type] $request
       * @return void
       */
    private function _manage_tags(&$request)
      {
      if (count($request->tags)) 
        {
        $request_tags = $request->tags;

        foreach ($request_tags as $key => $value) 
          {
          if(!is_numeric($value))
            {
            // creo la nuova categoria e sostituisco nella request il nome con l?ID in modo che quando faccio il syncronize() 
            // per assegnate le tags all'articolo funizona
            $new_tag = Tag::create(['nome' => $value]);
            $request_tags[$key] = $new_tag->id;
            }
          }
        $request->merge(['tags' => $request_tags]);    
        }
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
        
        $articolo->fill($request->except(['categorie','tags']))->save();
        
        $this->_manage_categorie($request);

        $articolo->categorie()->sync($request->categorie);

        $this->_manage_tags($request);

        $articolo->tags()->sync($request->tags);
        
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
