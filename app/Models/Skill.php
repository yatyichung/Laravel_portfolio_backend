<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $table="skills";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'skill',
        'level',
        'slug',
        'user_id',
    ];

    

    public function user()
    {
        return $this->belongsTo(USer::class, 'user_id');
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
