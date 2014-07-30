<?php
namespace Biz\ApiBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Util\Codes;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Biz\ApiBundle\Exception\InvalidFormException;

class UserController extends FOSRestController
{
    const USER_HANDLER = 'biz_api.user_handler';

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
        if (! ($user = $this->get(self::USER_HANDLER)->get($id))) {
            throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.', $id));
        }
        
        return $user;
    }
    
    /**
     * Register a user
     *
     * @ApiDoc(
     * resource = true,
     * input = "Biz\ApiBundle\Form\UserType",
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
            $newUser = $this->get(self::USER_HANDLER)->post($request->request->all());
            $routeOptions = array(
                'id' => $newUser->getId(),
                '_format' => $this->container->get('request')->get('_format')
            );
    
            return $this->routeRedirectView('api_get_user', $routeOptions, Codes::HTTP_CREATED);
        } catch (InvalidFormException $e) {
            return $e->getForm();
        }
    }
}