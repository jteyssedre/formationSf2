<?php

namespace Formation\CatalogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Formation\CatalogBundle\Entity\Category;

class LoadCategoryData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $data = [
            'categorie 1' => 'description1',
            'categorie 2' => 'description2',
            'categorie 3' => 'description3',
            'categorie 4' => 'description4'
        ];
        
        foreach ($data as $name => $description) {
            $category = new Category();
            $category->setName($name);
            $category->setDescription($description);
            
            $manager->persist($category);
        }
        
        $manager->flush();
    }
}
