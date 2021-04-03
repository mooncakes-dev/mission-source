<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $tables = 'user';

    protected $fillable = ['user_id', 'title', 'body', 'rating'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
