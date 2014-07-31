<?php
namespace Biz\ApiBundle\Handler;

class PostHandler extends Handler
{

    public function __construct($objectManager, $className, $formFactory)
    {
        parent::__construct($objectManager, $className, $formFactory);
    }
}