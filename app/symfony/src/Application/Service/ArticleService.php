<?php

namespace App\Application\Service;

use App\Domain\Entity\Article;
use App\Domain\Repository\ArticleRepositoryInterface;
use App\Domain\Repository\CategoryRepositoryInterface;

class ArticleService
{
    public function __construct(
        private readonly ArticleRepositoryInterface $articleRepository,
        private readonly CategoryRepositoryInterface $categoryRepository,
    ) {
    }

    public function createArticle(string $title, string $content, int $categoryId, int $authorId): Article
    {
        $category = $this->categoryRepository->findById($categoryId);
        $article = new Article($title, $content, $category, $authorId);
        $this->articleRepository->save($article);

        return $article;
    }
}
