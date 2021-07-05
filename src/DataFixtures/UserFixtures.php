<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $user = new User();
        $user->setEmail('chamouard.kellian@outlook.fr');
        $password = $this->encoder->encodePassword($user, 'bonjour');
        $user->setPassword($password);
        $user->setNom('Chamouard');
        $user->setPrenom('Kellian');
        $user->setTel('0778907411');
        $user->setAge('22');
        $user->setPays('France');
        $user->setPdp('https://scontent-cdg2-1.xx.fbcdn.net/v/t1.6435-9/72284613_2223022037821157_8465280145555456000_n.jpg?_nc_cat=111&ccb=1-3&_nc_sid=174925&_nc_ohc=UHMsc2217cYAX_dGHnM&_nc_ht=scontent-cdg2-1.xx&oh=a20fc796e6fadec3b3aaf1b8e5fb3421&oe=608B45E5');
        $user->setRoles(['ROLE_ADMIN']);

        $manager->persist($user);
        $manager->flush();
    }
}
