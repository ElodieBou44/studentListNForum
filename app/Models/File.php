<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_fr',
        'title_en',      
        'name',
        'user_id'
    ];
    
    public function fileHasUser(){
            
        return $this->hasOne('App\Models\User', 'id', 'user_id'); 
    
    }
}
