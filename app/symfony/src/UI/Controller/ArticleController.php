<?php

namespace App\UI\Controller;

use App\Application\Service\ArticleService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController
{
    public function __construct(private readonly ArticleService $articleService)
    {
    }

    /**
     * @Route("/article/create", name="create_article")
     */
    public function create(Request $request): Response
    {
        $title = $request->get('title');
        $content = $request->get('content');
        $categoryId = $request->get('category_id');
        $authorId = $request->get('author_id');

        $article = $this->articleService->createArticle($title, $content, $categoryId, $authorId);

        return new Response('Article created: '.$article->getTitle());
    }
}
