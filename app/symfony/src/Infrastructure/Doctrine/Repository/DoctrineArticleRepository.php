<?php

namespace App\Infrastructure\Doctrine\Repository;

use App\Domain\Entity\Article;
use App\Domain\Repository\ArticleRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

class DoctrineArticleRepository extends ServiceEntityRepository implements ArticleRepositoryInterface
{
    public const ALIAS = 'article';

    public function __construct(ManagerRegistry $registry, private readonly EntityManagerInterface $em)
    {
        parent::__construct($registry, Article::class);
    }

    public function save(Article $article): void
    {
        $this->em->persist($article);
        $this->em->flush();
    }

    public function findById(int $id): ?Article
    {
        return $this->em->getRepository(Article::class)->find($id);
    }
}
