<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Judge extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = [

    ];
    
    public function user(){

        return $this->belongsTo(User::class);
        
    }
        public function competition(){

                return $this->belongsToMany(Competition::class);
                
            }

}
