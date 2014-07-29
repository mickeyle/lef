<?php
namespace Biz\ApiBundle\Handler;

use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class UserHandler extends Handler
{

    /**
     *
     * @var EncoderFactoryInterface
     */
    private $encodeFactory;

    public function __construct($objectManager, $className, $formFactory, EncoderFactoryInterface $encodeFactory)
    {
        parent::__construct($objectManager, $className, $formFactory);
        $this->encodeFactory = $encodeFactory;
    }
}