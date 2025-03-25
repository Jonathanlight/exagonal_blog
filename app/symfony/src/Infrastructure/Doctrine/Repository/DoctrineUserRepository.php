<?php

namespace App\Infrastructure\Doctrine\Repository;

use App\Domain\Entity\User;
use App\Domain\Repository\UserRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

class DoctrineUserRepository extends ServiceEntityRepository implements UserRepositoryInterface
{
    public const ALIAS = 'user';

    public function __construct(ManagerRegistry $registry, private readonly EntityManagerInterface $_em)
    {
        parent::__construct($registry, User::class);
    }

    public function findById(int $id): ?User
    {
        return $this->createQueryBuilder(self::ALIAS)
            ->where(self::ALIAS.'.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
    }

    public function findByEmail(string $email): ?User
    {
        return $this->createQueryBuilder(self::ALIAS)
            ->where(self::ALIAS.'.email = :email')
            ->setParameter('email', $email)
            ->getQuery()
            ->getResult();
    }

    public function save(User $user): void
    {
        $this->_em->persist($user);
        $this->_em->flush();
    }

    public function remove(User $user): void
    {
        $this->_em->remove($user);
        $this->_em->flush();
    }
}
