<?php
namespace Biz\ApiBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormFactoryInterface;
use Doctrine\Common\Persistence\ObjectRepository;

abstract class Handler
{

    /**
     *
     * @var ObjectManager
     */
    protected $objectManager;

    protected $className;

    /**
     *
     * @var ObjectRepository
     */
    protected $repository;

    /**
     *
     * @var FormFactoryInterface
     */
    protected $formFactory;

    public function __construct(ObjectManager $objectManager, $className, FormFactoryInterface $formFactory)
    {
        $this->objectManager = $objectManager;
        $this->className = $className;
        $this->repository = $this->objectManager->getRepository($this->className);
        $this->formFactory = $formFactory;
    }

    public function get($id)
    {
        return $this->repository->find($id);
    }

    public function create()
    {
        return new $this->className();
    }
}