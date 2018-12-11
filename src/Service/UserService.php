<?php

namespace App\Service;

use App\Entity\User;
use App\Service\Traits\RepositoryResultsTrait;
use Doctrine\ORM\QueryBuilder;

/**
 * Class UserService
 */
class UserService extends BaseService
{
    use RepositoryResultsTrait;

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return User::class;
    }

    /**
     * @return QueryBuilder|User[]
     * @throws \Doctrine\ORM\ORMException
     */
    public function getAll()
    {
        return $this->getResult($this->repository->createAll());
    }
}