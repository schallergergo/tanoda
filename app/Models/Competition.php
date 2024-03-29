<?php

namespace App\Models;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Competition extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;
    protected $guarded = [

    ];


    public function judge(){


        return $this->belongsToMany(Judge::class);
        
    
    }

    public function team(){
        return $this->hasMany(Team::class);
    }

    public function contact(){
        return $this->hasMany(contact::class);
    }

    

}
