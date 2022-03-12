<?php
declare(strict_types=1);

namespace KennelApi\Application\Mappers\CustomMappers;
use AutoMapperPlus\CustomMapper\CustomMapper;
use KennelApi\Application\DTO\AddCategoryDTO;
use KennelApi\Domain\CategoryModel;

class AddCategoryDTOToCategoryModel extends CustomMapper
{

    /**
     * @param AddCategoryDTO $source
     * @param CategoryModel $destination
     * @return CategoryModel
     */
    public function mapToObject($source, $destination): CategoryModel
    {
        $destination->name = $source->name;
        $destination->parentId = $source->parentId;
        return $destination;
    }
}
