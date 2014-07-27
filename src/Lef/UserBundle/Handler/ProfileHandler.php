<?php
namespace Lef\UserBundle\Handler;

use Lef\UserBundle\Entity\Profile;
use Lef\UserBundle\Form\ProfileType;
use Lef\UserBundle\Exception\InvalidFormException;

class ProfileHandler extends Handler
{

    public function __construct($objectManager, $formFactory, $class)
    {
        parent::__construct($objectManager, $formFactory, $class);
    }

    public function createProfile()
    {
        return new $this->class();
    }

    public function post($userId, array $parameters)
    {
        $profile = $this->createProfile();
        $profile->setId($userId);
        $profile->setUpdatedAt(new \DateTime());
        
        return $this->processForm($profile, $parameters, 'POST');
    }

    public function put(Profile $profile, array $parameters)
    {
        return $this->processForm($profile, $parameters, 'PUT');
    }

    private function processForm(Profile $profile, array $parameters, $method = 'PUT')
    {
        $form = $this->formFactory->create(new ProfileType(), $profile, array(
            'method' => $method
        ));
        $form->submit($parameters, 'PATCH' !== $method);
        if ($form->isValid()) {
            $profile = $form->getData();
            $this->objectManager->persist($profile);
            $this->objectManager->flush();
            
            return $profile;
        }
        
        throw new InvalidFormException('Invalid submitted data', $form);
    }
}