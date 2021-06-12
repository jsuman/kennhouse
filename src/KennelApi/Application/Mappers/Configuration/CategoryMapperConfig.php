<?php
declare(strict_types=1);

namespace KennelApi\Application\Mappers\Configuration;

use AutoMapperPlus\AutoMapperPlusBundle\AutoMapperConfiguratorInterface;
use AutoMapperPlus\Configuration\AutoMapperConfigInterface;
use KennelApi\Application\DTO\AddCategoryDTO;
use KennelApi\Application\DTO\CategoryOutDTO;
use KennelApi\Application\Mappers\CustomMappers\AddCategoryDTOToCategoryDomainModel;
use KennelApi\Application\Mappers\CustomMappers\CategoryToCategoryOutDTO;
use KennelApi\Domain\CategoryDomainModel;
use KennelApi\Domain\Entities\Category;

class CategoryMapperConfig implements AutoMapperConfiguratorInterface
{
    /**
     * @param AutoMapperConfigInterface $config
     */
    public function configure(AutoMapperConfigInterface $config): void
    {
        $config->registerMapping(Category::class, CategoryOutDTO::class)
            ->useCustomMapper(new CategoryToCategoryOutDTO());
        $config->registerMapping(AddCategoryDTO::class, CategoryDomainModel::class)
            ->useCustomMapper(new AddCategoryDTOToCategoryDomainModel());
    }
}
