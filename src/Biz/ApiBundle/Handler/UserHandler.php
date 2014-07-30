<?php
namespace Biz\ApiBundle\Handler;

use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Dat\UserBundle\Entity\User;
use Biz\ApiBundle\Form\UserType;
use Biz\ApiBundle\Exception\InvalidFormException;

class UserHandler extends Handler
{

    /**
     *
     * @var EncoderFactoryInterface
     */
    private $encoderFactory;

    public function __construct($objectManager, $className, $formFactory, EncoderFactoryInterface $encodeFactory)
    {
        parent::__construct($objectManager, $className, $formFactory);
        $this->encoderFactory = $encodeFactory;
    }

    public function post(array $parameters)
    {
        $user = $this->create();
        
        return $this->processForm($user, $parameters, 'POST');
    }

    public function updatePassword(UserInterface $user)
    {
        if (0 !== strlen($password = $user->getPassword())) {
            $encode = $this->encoderFactory->getEncoder($user);
            $user->setPassword($encode->encodePassword($password, $user->getSalt()));
        }
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
}