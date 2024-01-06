<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository
{
    public function create($data)
    {
        return Article::create($data);
    }

    public function getList($count)
    {
        return Article::paginate($count);
    }

    public function search($keyword)
    {
        return Article::where('name', 'like', "%$keyword%")
            ->orWhere('description', 'like', "%$keyword%")
            ->orWhereHas('tags', function ($query) use ($keyword) {
                $query->where('name', 'like', "%$keyword%");
            })
            ->get();
    }

    public function findById($id)
    {
        return Article::find($id);
    }

    public function getAll()
    {
        return Article::all();
    }
}
