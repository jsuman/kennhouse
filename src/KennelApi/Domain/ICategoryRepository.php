<?php
declare(strict_types=1);

namespace KennelApi\Domain;

interface ICategoryRepository {
    public function getCategories(): array;
    public function addCategory(CategoryModel $categoryDomainModel): bool;
}
