<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'body',
        'user_id',
        'thread_id'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
