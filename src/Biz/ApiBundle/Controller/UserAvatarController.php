<?php
namespace Biz\ApiBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Util\Codes;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Biz\ApiBundle\Exception\InvalidFormException;

class UserAvatarController extends FOSRestController
{

    const USER_AVATAR_HANDLER = 'biz_api.user_avatar_handler';

    /**
     * Get user avatar information.
     *
     * @ApiDoc(
     * resource = true,
     * output = "Dat\FileBundle\Document\Photo",
     * statusCodes = {
     * 200 = "Returned when successful",
     * 404 = "Returned when the user is not found"
     * }
     * )
     *
     * @Annotations\View(templateVar="avatar")
     *
     * @param int $slug            
     * @param int $id            
     * @return Dat\FileBundle\Document\Photo
     *
     * @throws NotFoundHttpException when page not exist
     */
    public function getAvatarAction($slug, $id)
    {
        $avatar = $this->getOr404($id);
        
        return $avatar;
    }
    
    /**
     * Upload a new user avatar.
     *
     * @ApiDoc(
     * resource = true,
     * input = "Biz\ApiBundle\Form\UserAvatarType",
     * statusCodes = {
     * 201 = "Returned when successful",
     * 400 = "Returned when the form has errors"
     * }
     * )
     *
     * @Annotations\View( statusCode = Codes::HTTP_BAD_REQUEST )
     *
     * @param Request $request
     * @param int $slug
     *            user id
     * @return FormTypeInterface View
     */
    public function postAvatarAction(Request $request, $slug)
    {
        try {
            $newAvatar = $this->get(self::USER_AVATAR_HANDLER)->post($slug, $request->files->all());
            $routeOptions = array(
                'slug' => $slug,
                'id' => $newAvatar->getId(),
                '_format' => $request->get('_format')
            );
    
            return $this->routeRedirectView('api_get_user_avatar', $routeOptions, Codes::HTTP_CREATED);
        } catch (InvalidFormException $e) {
            return $e->getForm();
        }
    }

    protected function getOr404($id)
    {
        if (! ($user = $this->get(self::USER_AVATAR_HANDLER)->get($id))) {
            throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.', $id));
        }
        
        return $user;
    }
}