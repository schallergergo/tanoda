<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Team extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = [

    ];


    public function portfolio(){

        return $this->hasOne(Portfolio::class);
    }

    public function billing(){

        return $this->hasOne(Billing::class);
    }

    public function teammember(){
       return $this->hasMany(TeamMember::class);
    }

protected static function booted(): void
    {
        static::created(function (Team $team) {
                    Portfolio::create(["team_id"=>$team->id]);
                    Billing::create(["team_id"=>$team->id]);
            });
    }
}
