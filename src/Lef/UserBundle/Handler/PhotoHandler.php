<?php
namespace Lef\UserBundle\Handler;

use Lef\UserBundle\Entity\Photo;
use Lef\UserBundle\Form\PhotoType;
use Lef\UserBundle\Exception\InvalidFormException;

class PhotoHandler extends Handler
{

    public function __construct($objectManager, $formFactory, $class)
    {
        parent::__construct($objectManager, $formFactory, $class);
    }

    public function createPhoto()
    {
        return new $this->class();
    }

    public function post($userId, $parameters)
    {
        $photo = $this->createPhoto();
        $photo->setUserId($userId);
        
        return $this->processForm($photo, $parameters, 'POST');
    }

    public function delete($userId, $photoId)
    {
        $photo = $this->repository->find($photoId);
        
        if (null != $photo) {
            $this->objectManager->remove($photo);
            $this->objectManager->flush();
            
            return true;
        } else
            return false;
    }

    private function processForm(Photo $photo, array $parameters, $method = 'PUT')
    {
        $form = $this->formFactory->create(new PhotoType(), $photo, array(
            'method' => $method
        ));
        $form->submit($parameters, 'PATCH' !== $method);
        if ($form->isValid()) {
            $photo = $form->getData();
            $this->objectManager->persist($photo);
            $this->objectManager->flush();
            
            return $photo;
        }
        
        throw new InvalidFormException('Invalid submitted data', $form);
    }
}