<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class AssessmentBlock extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = [

    ];

    public function assessment(){
        return $this->belongsTo(Assessment::class);
        
    }

    protected static function booted(): void
    {
        static::updated(function (AssessmentBlock $block) {

            $assessment = $block->assessment;
            $assessment->total_point = $assessment->block->sum("point");
            $assessment->save();
            

        });
    }
}
