<?php

namespace App\Service\Traits;

use Doctrine\ORM\QueryBuilder;

/**
 * Trait RepositoryResultsTrait
 */
trait RepositoryResultsTrait
{
    /**
     * @var bool
     */
    protected $returnQuery = false;

    /**
     * @param bool $shouldReturnQuery
     *
     * @return mixed
     */
    public function setReturnQuery(bool $shouldReturnQuery)
    {
        $this->returnQuery = $shouldReturnQuery;

        return $this;
    }

    /**
     * @return bool
     */
    public function shouldReturnQuery(): bool
    {
        return $this->returnQuery;
    }

    /**
     * @param QueryBuilder $qb
     *
     * @return QueryBuilder|Order[]
     */
    public function getResult(QueryBuilder $qb)
    {
        $result = $this->returnQuery ? $qb : $qb->getQuery()->getResult();

        $this->setReturnQuery(false);

        return $result;
    }
}
