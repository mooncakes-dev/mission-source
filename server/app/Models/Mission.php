<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['user_id', 'title', 'description', 'estimated_time'];
    protected $casts = [
        'needed_roles' => 'array', 'needed_skills' => 'array', 'tags' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
