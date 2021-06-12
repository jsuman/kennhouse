<?php
declare(strict_types=1);

namespace KennelApi\Application\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class AddCategoryDTO
{
    /**
     * @Assert\PositiveOrZero()
     */
    public int $id = 0;
    /**
     * @Assert\NotBlank()
     */
    public string $name;

    /**
     * @Assert\PositiveOrZero()
     */
    public int $parentId;
}
