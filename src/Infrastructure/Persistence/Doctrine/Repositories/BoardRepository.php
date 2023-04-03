<?php

namespace App\Infrastructure\Persistence\Doctrine\Repositories;

use App\Domain\Cases\Board\DTO\GetAllRequest;
use App\Domain\Entities\Board;
use App\Domain\Interfaces\BoardRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Board>
 *
 * @method Board|null find($id, $lockMode = null, $lockVersion = null)
 * @method Board|null findOneBy(array $criteria, array $orderBy = null)
 * @method Board[]    findAll()
 * @method Board[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BoardRepository extends ServiceEntityRepository implements BoardRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Board::class);
    }

    public function save(Board $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Board $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @throws \Exception
     */
    public function getAllBoards(GetAllRequest $request): array
    {
        $query = $this->createQueryBuilder('b')
            ->orderBy('b.updatedAt', 'DESC')
            ->getQuery();
        $paginator = new Paginator($query);

        $paginator->getQuery()
            ->setFirstResult($request->getLimit() * ($request->getPage() - 1)) // Offset
            ->setMaxResults($request->getLimit()); // Limit

        return $paginator->getIterator()->getArrayCopy();
    }
}
