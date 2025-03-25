<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Article;

interface ArticleRepositoryInterface
{
    public function save(Article $article): void;

    public function findById(int $id): ?Article;
}
