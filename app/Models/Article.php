<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image_name',
        'image_path',
        'user_id'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tags');
    }
}
