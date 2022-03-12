<?php
declare(strict_types=1);

namespace KennelApi\Application\Mappers\CustomMappers;

use AutoMapperPlus\CustomMapper\CustomMapper;
use KennelApi\Application\DTO\CategoryOutDTO;
use KennelApi\Domain\Entities\Category;

class CategoryToCategoryOutDTO extends CustomMapper
{
    /**
     * @param Category $source
     * @param CategoryOutDTO $destination
     * @return CategoryOutDTO
     */
    public function mapToObject($source, $destination): CategoryOutDTO
    {
        $destination->name = $source->getName();
        $destination->parentId = $source->getParentId();
        $destination->id = $source->getId();
        $destination->created = $source->getCreated()->format(DATE_RFC3339);
        $destination->deleted = $source->getDeleted()? $source->getDeleted()->format(DATE_RFC3339): null;
        return $destination;
    }
}
