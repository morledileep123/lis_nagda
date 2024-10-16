<?php

namespace App\Models\gallery;

use Illuminate\Database\Eloquent\Model;

class GalleryFolder extends Model
{
    protected $table = 'gallery_folders';
    protected $guarded =[];
    
    public function gallery_image(){
  		return $this->hasMany('App\Models\gallery\GalleryImage','folder_id','id');
   	}
}
