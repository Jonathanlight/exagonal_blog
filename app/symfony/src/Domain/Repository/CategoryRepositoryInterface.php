<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Category;

interface CategoryRepositoryInterface
{
    public function save(Category $category): void;

    public function findById(int $id): ?Category;
}
