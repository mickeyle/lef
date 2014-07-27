<?php
namespace Lef\UserBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Lef\UserBundle\Entity\User;
use Lef\UserBundle\Form\UserType;
use Lef\UserBundle\Exception\InvalidFormException;

class UserHandler
{

    private $objectManager;

    private $class;

    private $repository;

    private $encoderFactory;

    private $formFactory;

    public function __construct(ObjectManager $objectManager, $class, EncoderFactoryInterface $encoderFactory, FormFactoryInterface $formFactory)
    {
        $this->objectManager = $objectManager;
        $this->class = $class;
        $this->repository = $objectManager->getRepository($class);
        $this->encoderFactory = $encoderFactory;
        $this->formFactory = $formFactory;
    }

    public function get($id)
    {
        return $this->repository->find($id);
    }

    public function post(array $parameters)
    {
        $user = $this->createUser();
        
        return $this->processForm($user, $parameters, 'POST');
    }

    private function processForm(User $user, array $parameters, $method = 'PUT')
    {
        $form = $this->formFactory->create(new UserType(), $user, array(
            'method' => $method
        ));
        $form->submit($parameters, 'PATCH' !== $method);
        if ($form->isValid()) {
            $user = $form->getData();
            $this->updatePassword($user);
            $this->objectManager->persist($user);
            $this->objectManager->flush();
            
            return $user;
        }
        
        throw new InvalidFormException('Invalid submitted data', $form);
    }

    public function updatePassword(UserInterface $user)
    {
        if (0 !== strlen($password = $user->getPassword())) {
            $encode = $this->encoderFactory->getEncoder($user);
            $user->setPassword($encode->encodePassword($password, $user->getSalt()));
        }
    }

    private function createUser()
    {
        return new $this->class();
    }
}