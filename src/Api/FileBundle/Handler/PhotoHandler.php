<?php
namespace Api\FileBundle\Handler;

use Api\CommonBundle\Handler\Handler;
use Api\CommonBundle\Exception\InvalidFormException;
use Api\FileBundle\Form\PhotoUploadType;
use Api\FileBundle\Model\PhotoUpload;

class PhotoHandler extends Handler
{

    public function __construct($objectManager, $className, $formFactory)
    {
        parent::__construct($objectManager, $className, $formFactory);
    }

    public function create()
    {
        return new $this->className();
    }

    public function post(array $parameters)
    { var_dump($parameters);
        $photoUpload = new PhotoUpload();
        
        return $this->processForm($photoUpload, $parameters, 'POST');
    }

    private function processForm(PhotoUpload $photoUpload, array $parameters, $method = 'PUT')
    {
        $form = $this->formFactory->create(new PhotoUploadType(), $photoUpload, array(
            'method' => $method
        ));
        
        $form->submit($parameters, 'PATCH' != $method);
        if ($form->isValid()) {
            return array(
                'test' => true
            );
        }
        
        throw new InvalidFormException('Invalid submitted data', $form);
    }
}