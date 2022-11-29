<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'date_time_published',
        'description',
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function lecture()
    {
      return $this->belongsTo(Lecture::class);
    }
}