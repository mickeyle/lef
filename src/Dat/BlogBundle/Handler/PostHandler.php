<?php
namespace Dat\BlogBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;

class PostHandler
{
    /*
     * @var ObjectManager
     */
    private $objectManager;

    private $repository;

    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
        $this->repository = $this->objectManager->getRepository('Post');
    }

    public function get($id)
    {
        return $this->repository->find($id);
    }
}