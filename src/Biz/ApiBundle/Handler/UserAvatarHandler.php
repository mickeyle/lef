<?php
namespace Biz\ApiBundle\Handler;

use Dat\FileBundle\Document\Photo;
use Biz\ApiBundle\Form\UserAvatarType;
use Biz\ApiBundle\Model\UserAvatar;
use Biz\ApiBundle\Exception\InvalidFormException;

class UserAvatarHandler extends Handler
{
    public function __construct($objectManager, $formFactory, $class)
    {
        parent::__construct($objectManager, $formFactory, $class);
    }
    
    public function post($userId, array $parameters)
    {
        $photo = $this->create();
        $photo->setType('avatar');
        $photo->setUserId($userId);
        $photo->setCreatedAt(new \MongoDate());
    
        return $this->processForm($photo, $parameters, 'POST');
    }
    
    public function put(Photo $photo, array $parameters)
    {
        return $this->processForm($photo, $parameters, 'PUT');
    }
    
    private function processForm(Photo $photo, array $parameters, $method = 'PUT')
    {
        $form = $this->formFactory->create(new UserAvatarType(), new UserAvatar(), array(
            'method' => $method
        ));
        $form->submit($parameters, 'PATCH' !== $method);
        if ($form->isValid()) { 
            $userAvatar = $form->getData();
            $photo->setFile($userAvatar->getFile());
            
            $this->objectManager->persist($photo);
            $this->objectManager->flush();
    
            return $photo;
        }
    
        throw new InvalidFormException('Invalid submitted data', $form);
    }
}