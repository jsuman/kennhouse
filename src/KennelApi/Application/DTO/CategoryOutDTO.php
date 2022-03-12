<?php
declare(strict_types=1);

namespace KennelApi\Application\DTO;


class CategoryOutDTO
{
    public ?int $id;
    public ?string $name;
    public ?int $parentId;
    public ?string $created;
    public ?string $deleted;
}
