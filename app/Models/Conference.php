<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;

    protected $table = 'conferences';

    protected $fillable = [
        'title',
        'date_time_event',
        'latitude',
        'longitude',
        'country',
        'category_id',
    ];

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function lectures() {
      return $this->hasMany(Lecture::class);
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
