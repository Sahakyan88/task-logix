<?php

namespace App\Services;

use App\Repositories\ArticleRepository;
use Illuminate\Support\Facades\Storage;

class ArticleService
{
    /**
     * @var ArticleService
     */
    protected $articleRepository;

    /**
     * @param ArticleRepository $articleRepository
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function create($articleData)
    {
        $data = [];
        $decodedImage = base64_encode($articleData['image']);
        $imageName = 'file_' . time() . '.' . $articleData['image']->getClientOriginalExtension();
        Storage::disk('public')->put($imageName, $decodedImage);
        $image_name = pathinfo($articleData['image']->getClientOriginalName(), PATHINFO_FILENAME);
        $data_name = md5($image_name . microtime());
        $extension = $articleData['image']->getClientOriginalExtension();
        $fileData = $data_name . '.' . $extension;

        $data['image_path'] = "/storage/" . $fileData;
        $data['image_name'] = $imageName;
        $data['name'] = $articleData['name'];
        $data['description'] = $articleData['description'];

        return $this->articleRepository->create($data);
    }


    public function getList($count)
    {
        return $this->articleRepository->getList($count);
    }

    public function getAll()
    {
        return $this->articleRepository->getAll();
    }

    public function searchArticles($keyword)
    {
        return $this->articleRepository->search($keyword);
    }
}
