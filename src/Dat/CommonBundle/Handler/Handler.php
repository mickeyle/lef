<?php
namespace Dat\CommonBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;

abstract class Handler
{

    /**
     *
     * @var ObjectManager
     */
    protected $objectManager;

    protected $repository;

    public function __construct(ObjectManager $objectManager, $className)
    {
        $this->objectManager = $objectManager;
        $this->repository = $this->objectManager->getRepository($className);
    }

    public function get($id)
    {
        return $this->repository->find($id);
    }
}