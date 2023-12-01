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
    public function competition(){

        return $this->belongsTo(Competition::class);
    }

    public function billing(){

        return $this->hasOne(Billing::class);
    }

    public function teammember(){
       return $this->hasMany(TeamMember::class);
    }
    public function assessment(){
        return $this->hasMany(Assessment::class);
    }

    public function onlineperiod(){
        return $this->hasMany(OnlinePeriod::class);
    }

protected static function booted(): void
    {
        static::created(function (Team $team) {
                    $portfolio = Portfolio::create(["team_id"=>$team->id]);
                    $billing = Billing::create(["team_id"=>$team->id]);
                    $judges = $team->competition->judge;
                    foreach($judges as $judge)
                    {
                        Assessment::create(["team_id",$team->id,"portfolio_id",$portfolio->id]);
                    }

            });
    }
}
