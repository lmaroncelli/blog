<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  protected $excerpt = null;
  public function __construct(array $attributes = array())
    {
      $this->excerpt = Str::words(htmlspecialchars_decode(strip_tags($this->corpo)), 15, ' >>>'); 
      parent::__construct($attributes);

    }

  protected $table = 'tblArticoli';

	protected $guarded = ['id'];

  //  By default, Eloquent will convert the created_at and updated_at columns to instances of Carbon 
  //protected $dates = ['dalle','alle'];


  use Searchable;

  /**
   * Get the index name for the model.
   *
   * @return string
   */
  public function searchableAs()
  {
      return 'articoli_index';
  }

  public function categorie()
  {
      return $this->belongsToMany('App\Category', 'tblArticoliCategorie', 'articolo_id', 'categoria_id');
  }

  public function toSearchableArray()
  {

      $this->categorie;

      $array = $this->toArray();


      return $array;
  }


  public function getCategorie()
  {
    return implode(', ',Self::categorie()->pluck('nome')->toArray());
  }

  public function getExcerpt()
    {
      return Str::words(htmlspecialchars_decode(strip_tags($this->corpo)), 15, ' >>>');
    }


 
  



  



}
