<?php
declare(strict_types=1);

namespace KennelApi\Infrastructure;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use KennelApi\Domain\CategoryDomainModel;
use KennelApi\Domain\Entities\Category;
use KennelApi\Domain\ICategoryRepository;
use Symfony\Component\Config\Definition\Exception\Exception;

class CategoryRepository extends ServiceEntityRepository implements ICategoryRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    /**
     * @return array
     */
    public function getCategories(): array
    {
        $qb = $this->_em->createQueryBuilder();
        try{
           $qb->select('c')
           ->from(Category::class, 'c');
           return $qb->getQuery()->getResult();
        }catch (Exception $e) {

        }
    }

    public function addCategory(CategoryDomainModel $categoryDomainModel): bool
    {
        // TODO: Implement addCategory() method.
    }
}
