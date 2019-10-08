<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  protected $table = 'tblTags';

	protected $guarded = ['id'];

  //  By default, Eloquent will convert the created_at and updated_at columns to instances of Carbon 
  //protected $dates = ['dalle','alle'];

  
  public function articoli()
  {
      return $this->belongsToMany('App\Article', 'tblArticoliTags', 'tag_id', 'articolo_id');
  }
}
