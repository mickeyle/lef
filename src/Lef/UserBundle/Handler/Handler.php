<?php
namespace Lef\UserBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use Symfony\Component\Form\FormFactoryInterface;

abstract class Handler
{

    /**
     *
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     *
     * @var FormFactoryInterface
     */
    protected $formFactory;

    /**
     *
     * @var ObjectRepository
     */
    protected $repository;

    protected $class;

    public function __construct(ObjectManager $objectManager, FormFactoryInterface $formFactory, $class)
    {
        $this->objectManager = $objectManager;
        $this->class = $class;
        $this->repository = $objectManager->getRepository($class);
        $this->formFactory = $formFactory;
    }

    public function get($id)
    {
        return $this->repository->find($id);
    }
}