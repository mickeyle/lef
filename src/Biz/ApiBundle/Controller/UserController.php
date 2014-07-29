<?php
namespace Biz\ApiBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class UserController extends FOSRestController
{

    /**
     * Get single User.
     *
     * @ApiDoc(
     * resource= true,
     * output = "Dat\UserBundle\Entity\User",
     * statusCodes = {
     * 200 = "Returned when successful",
     * 404 = "Returned when the user is not found"
     * }
     * )
     *
     * @Annotations\View(templateVar="user")
     *
     * @param Request $request            
     * @param int $id            
     *
     * @return Dat\UserBundle\Entity\User
     * @throws NotFoundHttpException
     */
    public function getUserAction($id)
    {
        $user = $this->getOr404($id);
        
        return $user;
    }

    protected function getOr404($id)
    {
        if (! ($user = $this->container->get('biz_api.user_handler')->get($id))) {
            throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.', $id));
        }
        
        return $user;
    }
}