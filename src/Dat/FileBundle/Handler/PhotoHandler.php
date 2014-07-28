<?php
namespace Dat\BlogBundle\Handler;

use Dat\CommonBundle\Handler\Handler;
use Dat\FileBundle\Document\Photo;

class PhotoHandler extends Handler
{

    private $className = 'Dat\FileBundle\Document\Photo';

    public function __construct($objectManager)
    {
        parent::__construct($objectManager, $className);
    }

    public function post(Photo $photo)
    {
    	$this->objectManager->persist($photo);
    	$this->objectManager->flush();
    	
    	return $photo;
    }
}