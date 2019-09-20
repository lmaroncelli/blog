<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $table = 'tblCategorie';

	protected $guarded = ['id'];

  //  By default, Eloquent will convert the created_at and updated_at columns to instances of Carbon 
  //protected $dates = ['dalle','alle'];

  
  public function articoli()
  {
      return $this->belongsToMany('App\Article', 'tblArticoliCategorie', 'categoria_id', 'articolo_id');
  }

}
