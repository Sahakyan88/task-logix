<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\Tag;

class TagRepository
{
    public function getAll()
    {
        return Tag::all();
    }
}
