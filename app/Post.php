<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;


class Post extends Model
{
    use Softdeletes;
    protected $fillable = [
        'title', 'content', 'featured','category_id','slug'
    ];
       public function getfeaturedAttribute($featured)
         {
            return asset($featured);
         }
   protected $dates=['deleted_at'];
     public function category()
     {
         return $this->belongsTo('App\Category');
     }
     public function tags(){
         return $this->belongsToMany('App\Tag');
     }
}
