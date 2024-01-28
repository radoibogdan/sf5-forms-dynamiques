<?php

namespace App\DataFixtures;

use App\Entity\Departements;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class DepartementsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $departements = [
            1 => [
                'name' => 'Dep 1',
                'number' => '81'
            ],
            2 => [
                'name' => 'Dep 2',
                'number' => '82'
            ],
            3 => [
                'name' => 'Dep 3',
                'number' => '83'
            ],
            4 => [
                'name' => 'Dep 4',
                'number' => '84'
            ],
        ];
        $faker = Faker\Factory::create('fr_FR');
        $region = $this->getReference('region_'. $faker->numberBetween(1, 4));

        foreach($departements as $key => $value){
            $dep = new Departements();
            $dep->setName($value['name']);
            $dep->setNumber($value['number']);
            $dep->setRegions($region);
            $manager->persist($dep);

            // Enregistre la catégorie dans une référence
            $this->addReference('departement_' . $key, $dep);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            RegionsFixtures::class,
        ];
    }
}
