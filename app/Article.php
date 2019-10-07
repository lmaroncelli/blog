<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
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


 
  



  



}
