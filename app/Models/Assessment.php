<?php

namespace App\Models;




use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Assessment extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = [

    ];

   
   public function block(){
        return $this->hasMany(AssessmentBlock::class);
    }

    /**
     * The "booted" method of the model.
     */

    

    protected static function booted(): void
    {
        static::created(function (Assessment $assessment) {
            $blockTypes=["stand","professionalism","marketing","catalog"];
            foreach($blockTypes as $type){
                AssessmentBlock::create([
                    "assessment_id"=>$assessment->id,
                    "type"=>$type,
                ]);
            }

        });
    }
}
