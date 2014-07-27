<?php
namespace Lef\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository implements UserProviderInterface
{

    public function loadUserByUsername($username)
    {
        $query = $this->createQueryBuilder('u')
            ->where('u.username = :username OR u.mobile = :mobile OR u.email = :email')
            ->setParameter('username', $username)
            ->setParameter('mobile', $username)
            ->setParameter('email', $username)
            ->getQuery();
        
        try {
            $user = $query->getSingleResult();
        } catch (NoResultException $e) {
            $message = sprintf('Unable to find an active admin UserUserBundle:User object identified by "%s".', $username);
            throw new UsernameNotFoundException($message, 0, $e);
        }
        
        return $user;
    }

    public function refreshUser(UserInterface $user)
    {
        $class = get_class($user);
        if (! $this->supportsClass($class)) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $class));
        }
        
        return $this->find($user->getId());
    }

    public function supportsClass($class)
    {
        return $this->getEntityName() == $class || is_subclass_of($class, $this->getEntityName());
    }
}
