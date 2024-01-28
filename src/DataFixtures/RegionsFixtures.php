<?php

namespace App\DataFixtures;

use App\Entity\Regions;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RegionsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $regions = [
            1 => [
                'name' => 'Region 1',
            ],
            2 => [
                'name' => 'Region 2',
            ],
            3 => [
                'name' => 'Region 3',
            ],
            4 => [
                'name' => 'Region 4',
            ],
        ];

        foreach($regions as $key => $value){
            $region = new Regions();
            $region->setName($value['name']);
            $manager->persist($region);

            // Enregistre la catégorie dans une référence
            $this->addReference('region_' . $key, $region);
        }

        $manager->flush();
    }
}
