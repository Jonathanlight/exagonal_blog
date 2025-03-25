<?php

namespace App\Infrastructure\Doctrine\Repository;

use App\Domain\Entity\Category;
use App\Domain\Repository\CategoryRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

class DoctrineCategoryRepository extends ServiceEntityRepository implements CategoryRepositoryInterface
{
    public const ALIAS = 'category';

    public function __construct(ManagerRegistry $registry, private readonly EntityManagerInterface $em)
    {
        parent::__construct($registry, Category::class);
    }

    public function save(Category $category): void
    {
        $this->em->persist($category);
        $this->em->flush();
    }

    public function findById(int $id): ?Category
    {
        return $this->em->getRepository(Category::class)->find($id);
    }
}
