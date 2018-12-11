<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserFixtures
 */
class UserFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    /**
     * UserFixtures constructor.
     *
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('admin');
        $user->setName('Paulius');
        $user->setSurname('Jazauskas');
        $user->setEmail('p.jazauskas@gmail.com');
        $user->setPassword(
            $this->encoder->encodePassword($user, 'ursa')
        );
        $user->setRoles(['ROLE_ADMIN']);

        $manager->persist($user);
        $manager->flush();

        $user = new User();
        $user->setUsername('user');
        $user->setName('Paulius');
        $user->setSurname('Jazauskas');
        $user->setEmail('amdpaulius@gmail.com');
        $user->setPassword(
            $this->encoder->encodePassword($user, 'ursa')
        );
        $user->setRoles(['ROLE_USER']);

        $manager->persist($user);
        $manager->flush();
    }
}
