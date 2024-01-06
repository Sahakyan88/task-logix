<?php

namespace App\Repositories;

use App\Models\Tag;

class TagRepository
{
    public function getAll()
    {
        return Tag::all();
    }
}
