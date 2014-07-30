<?php
namespace Biz\ApiBundle\Handler;

use Dat\UserBundle\Entity\Profile;
use Biz\ApiBundle\Form\UserProfileType;
use Biz\ApiBundle\Exception\InvalidFormException;

class UserProfileHandler extends Handler
{

    public function __construct($objectManager, $formFactory, $class)
    {
        parent::__construct($objectManager, $formFactory, $class);
    }


    public function post($userId, array $parameters)
    {
        $profile = $this->create();
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
        $form = $this->formFactory->create(new UserProfileType(), $profile, array(
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