<?php
namespace App\DataFixtures;

use App\Entity\Employe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EmployeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $employe = new Employe();
        $employe->setSector('informatique');
        $employe->setFirstname('natan');
        $employe->setLastname('davin');
        $employe->setPhoto('test');

        $manager->persist($employe);
        $manager->flush();

        $employe = new Employe();
        $employe->setSector('direction');
        $employe->setFirstname('toto');
        $employe->setLastname('tata');
        $employe->setPhoto('test2');

        $manager->persist($employe);
        $manager->flush();
    }
}
