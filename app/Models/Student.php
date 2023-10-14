<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',     
        'address',
        'phone', 
        'email',
        'birthdate',
        'city_id',
        'user_id'
    ];
    
    public function studentHasCity(){
            
        return $this->hasOne('App\Models\City', 'id', 'city_id'); 
    
    }
}
