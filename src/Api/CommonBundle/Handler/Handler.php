<?php
namespace Api\CommonBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormFactoryInterface;

abstract class Handler
{

    /**
     *
     * @var ObjectManager
     */
    protected $objectManager;

    protected $repository;

    protected $formFactory;

    public function __construct(ObjectManager $objectManager, $className, FormFactoryInterface $formFactory)
    {
        $this->objectManager = $objectManager;
        $this->repository = $this->objectManager->getRepository($className);
        $this->formFactory = $formFactory;
    }

    protected function get($id)
    {
        return $this->repository->find($id);
    }
}