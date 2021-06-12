<?php
declare(strict_types=1);

namespace KennelApi\Application\Mappers\CustomMappers;
use AutoMapperPlus\CustomMapper\CustomMapper;
use KennelApi\Application\DTO\AddCategoryDTO;
use KennelApi\Domain\CategoryDomainModel;

class AddCategoryDTOToCategoryDomainModel extends CustomMapper
{

    /**
     * @param AddCategoryDTO $source
     * @param CategoryDomainModel $destination
     * @return CategoryDomainModel
     */
    public function mapToObject($source, $destination): CategoryDomainModel
    {
        $destination->name = $source->name;
        $destination->parentId = $source->parentId;
        return $destination;
    }
}
