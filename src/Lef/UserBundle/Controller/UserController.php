<?php
namespace Lef\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Form\FormTypeInterface;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Lef\UserBundle\Exception\InvalidFormException;

class UserController extends FOSRestController
{

    /**
     * Get single User.
     *
     * @ApiDoc(
     * resource= true,
     * output = "Lef\UserBundle\Entity\User",
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
     * @return array
     * @throws NotFoundHttpException
     */
    public function getUserAction($id)
    {
        $user = $this->getOr404($id);
        
        return $user;
    }

    /**
     * 注册新用户
     *
     * @ApiDoc(
     * resource = true,
     * input = "Lef\UserBundle\Form\UserType",
     * statusCodes = {
     * 201 = "Returned when successful",
     * 400 = "Returned when the form has errors"
     * }
     * )
     *
     * @Annotations\View(statusCode=Codes::HTTP_BAD_REQUEST)
     *
     * @param Request $request
     *            the request object
     * @return FormTypeInterface RouteRedirectView
     */
    public function postUserAction(Request $request)
    {
        try {
            $newUser = $this->container->get('lef_user.user.handler')->post($request->request->all());
            $routeOptions = array(
                'id' => $newUser->getId(),
                '_format' => $this->container->get('request')->get('_format')
            );
            
            return $this->routeRedirectView('api_3_get_user', $routeOptions, Codes::HTTP_CREATED);
        } catch (InvalidFormException $e) {
            return $e->getForm();
        }
    }

    protected function getOr404($id)
    {
        if (! ($user = $this->container->get('lef_user.user.handler')->get($id))) {
            throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.', $id));
        }
        
        return $user;
    }
}