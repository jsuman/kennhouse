<?php
declare(strict_types=1);

namespace KennelApi\Application;

use AutoMapperPlus\AutoMapperInterface;
use AutoMapperPlus\Exception\UnregisteredMappingException;
use AutoMapperPlus\MapperInterface;
use KennelApi\Application\DTO\AddCategoryDTO;
use KennelApi\Application\DTO\CategoryOutDTO;
use KennelApi\Domain\CategoryModel;
use KennelApi\Domain\ICategoryRepository;

class CategoryService
{
    private ICategoryRepository $repository;
    private MapperInterface $mapper;

    /**
     * CategoryService constructor.
     * @param ICategoryRepository $repository
     * @param AutoMapperInterface $mapper
     */
    public function __construct(ICategoryRepository $repository, AutoMapperInterface $mapper)
    {
        $this->repository = $repository;
        $this->mapper = $mapper;
    }

    /**
     * @return array
     */
    public function getCategories(): array
    {
        return $this->mapper->mapMultiple(
            $this->repository->getCategories(),
            CategoryOutDTO::class);
    }
    /**
     * @param AddCategoryDTO $addCategoryDTO
     * @return bool
     * @throws UnregisteredMappingException
     */
    public function addCategory(AddCategoryDTO $addCategoryDTO): bool
    {
        return $this->repository->addCategory(
            $this->mapper->map($addCategoryDTO,
                CategoryModel::class
            )
        );
    }
}
