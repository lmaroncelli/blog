# blade

class=" {{Request::path() === 'about' ? 'current' : ''}} "


// is(mixed ...$patterns)
//Determine if the current request URI matches a pattern.

class=" {{Request::is('about*') ? 'current' : ''}} "





@if($errors->has('title'))
<div class"danger">{{ $errors->first('title') }}</div>
@endif

OPPURE

@error('title')
<div class"danger">{{ $errors->first('title') }}</div>
@enderror







# Eloquent

Article::all()

Article::take(20)->get();
Article::paginate(20);


**crea il controller RESTFul e una model che viene utilizzata con Model Bindng dentro il controller
php artisan make:controller ProjectController -r -m Project 





# Model binding


articles/{$article}/edit

function edit(Article $article)

Laravel "is smart enough to..." fa la query da solo e trova l'istanza $article

// $article = Article::where('id',$article)->first()

ATTENZIONE:

se non passo l'ID ma ad esempio lo slug

articles/{$article_slug}/edit

// $article = Article::where('id',$article_slug)->first() FALLISCE


devo andare nella Model Article e SOVRASCRIVERE il metodo con il nome del campo con cui Laravel
deve trovare l'oggetto "behind the scene"

public function getRouteKeyName()
{
  return 'slug';
}


in questo modo la query implicita diventa 

$article = Article::where('slug',$article_slug)->first() FALLISCE





  create and activate oneshot:

  Article::create(request()->validate([
    'title' => 'required',
    'body' => 'required',
    'excerpt' => 'required'
  ]));




  # Dummy data

Se ho una classe Factory, la psso usare per generare dei dati: ad esempio di default ho la classe UserFactory; da tinker console



> factory(App\User::class)->create();
 
 mi viene generato uno user di prova


> factory(App\User::class, 10)->create();

genera 10 user fake



php artisan make:factory ArticleFactory -m "App\Article"

$factory->define(Article::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class),
        'title' => $faker->sentence,
        'excerpt' => $faker->sentence,
        'body' => $faker->paragraphs(2),
    ];
});


> factory(App\Article::class, 5)->create();

crea 5 articoli associati ad altrettanti nuovi utenti



se voglio sovrascrivere un attributo lo passo al metodo create()

> factory(App\Article::class, 5)->create(['title' => 'Questo è il titolo']);


> factory(App\Article::class, 5)->create(['user_id' => 1]);

crea 5 articoli associati allo stesso utente





# FK constraint

ATTENZIONE: se cancello uno user che ha scritto articoli, questi ultimi rimangono orfani!!


Quando definisco la tabella tblArticles dichiaro anche un constraint per la colonna FK "user_id"

$table->foreign('user_id')
      ->references('id')
      ->on('users')
      ->onDelete('cascade');

se cancello l'utente "in cascata" cancello anche i suoi articoli!!



Se ho una relazione molti-a-molti tabella article_tag

$table->unique(['article_id', 'tag_id']);
$table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
$table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');