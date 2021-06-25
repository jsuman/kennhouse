<?php
declare(strict_types=1);

namespace App\Fixtures\Category;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use KennelApi\Domain\Entities\Category;

class CategoryFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $category->setName('testName');
        $category->setParentId(1);
        $category->setCreated(new \DateTimeImmutable());
        $category->setDeleted(null);
        $manager->persist($category);
        $manager->flush();
    }
}
