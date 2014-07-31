<?php
namespace Biz\ApiBundle\Handler;

use Dat\BlogBundle\Document\Post;
use Biz\ApiBundle\Form\PostType;
use Biz\ApiBundle\Exception\InvalidFormException;

class PostHandler extends Handler
{

    public function __construct($objectManager, $className, $formFactory)
    {
        parent::__construct($objectManager, $className, $formFactory);
    }

    public function all($limit = 5, $offset = 0)
    {
        return $this->repository->findBy(array(), null, $limit, $offset);
    }

    public function post(array $parameters, $userId)
    {
        $post = $this->create();
        $post->setUserId($userId);
        $post->setCreatedAt(new \MongoDate());
        
        return $this->processForm($post, $parameters, 'POST');
    }

    public function put(Post $post, array $parameters)
    {
        return $this->processForm($post, $parameters, 'PUT');
    }

    public function patch(Post $post, array $parameters)
    {
        return $this->processForm($post, $parameters, 'PATCH');
    }

    public function delete(Post $post)
    {
        $this->objectManager->remove($post);
        $this->objectManager->flush();
    }

    private function processForm(Post $post, array $parameters, $method = "PUT")
    {
        $form = $this->formFactory->create(new PostType(), $post, array(
            'method' => $method
        ));
        $form->submit($parameters, 'PATCH' !== $method);
        if ($form->isValid()) {
            
            $page = $form->getData();
            $this->objectManager->persist($post);
            $this->objectManager->flush();
            
            return $post;
        }
        
        throw new InvalidFormException('Invalid submitted data', $form);
    }
}