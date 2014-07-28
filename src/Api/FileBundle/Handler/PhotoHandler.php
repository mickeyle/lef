<?php
namespace Api\FileBundle\Handler;

use Api\CommonBundle\Handler\Handler;

class PhotoHandler extends Handler
{

    public function __construct($objectManager, $className, $formFactory)
    {
        parent::__construct($objectManager, $className, $formFactory);
    }
}