<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  protected $table = 'tblArticoli';

	protected $guarded = ['id'];

  //  By default, Eloquent will convert the created_at and updated_at columns to instances of Carbon 
  //protected $dates = ['dalle','alle'];


  public function categorie()
  {
      return $this->belongsToMany('App\Category', 'tblArticoliCategorie', 'articolo_id', 'categoria_id');
  }

  public function getCategorie()
  {
    return implode(', ',Self::categorie()->pluck('nome')->toArray());
  }


 
  



  



}
