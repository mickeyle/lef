<?php
namespace Biz\ApiBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Util\Codes;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Biz\ApiBundle\Exception\InvalidFormException;

class UserProfileController extends FOSRestController
{

    const USER_PROFILE_HANDLER = 'biz_api.user_profile_handler';

    /**
     * Get user profile.
     *
     * @ApiDoc(
     * resource = true,
     * output = "Dat\UserBundle\Entity\Profile",
     * statusCodes = {
     * 200 = "Returned when successful",
     * 404 = "Returned when the user is not found"
     * }
     * )
     *
     * @Annotations\View(templateVar="profile")
     *
     * @param int $slug            
     * @param int $id            
     * @return Dat\UserBundle\Entity\Profile
     *
     * @throws NotFoundHttpException when page not exist
     */
    public function getProfileAction($slug, $id)
    {
        $profile = $this->getOr404($id);
        
        return $profile;
    }

    /**
     * Create a new user Profile.
     *
     * @ApiDoc(
     * resource = true,
     * input = "Biz\ApiBundle\Form\UserProfileType",
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
    public function postProfileAction(Request $request, $slug)
    {
        try {
            $newProfile = $this->get(self::USER_PROFILE_HANDLER)->post($slug, $request->request->all());
            $routeOptions = array(
                'slug' => $newProfile->getId(),
                'id' => $newProfile->getId(),
                '_format' => $request->get('_format')
            );
            
            return $this->routeRedirectView('api_get_user_profile', $routeOptions, Codes::HTTP_CREATED);
        } catch (InvalidFormException $e) {
            return $e->getForm();
        }
    }

    /**
     * Update existing user profile from the submitted data or create a new user profile at a specific location.
     *
     * @ApiDoc(
     * resource = true,
     * input = "Biz\ApiBundle\Form\UserProfileType",
     * statusCodes = {
     * 201 = "Returned when the user Profile is created",
     * 204 = "Returned when successful",
     * 400 = "Returned when the form has errors"
     * }
     * )
     *
     * @param Request $request
     *            the request object
     * @param int $slug
     *            user id
     * @param int $id
     *            profile id
     *            
     * @return FormTypeInterface View
     *        
     * @throws NotFoundHttpException when user Profile not exist
     */
    public function putProfileAction(Request $request, $slug, $id)
    {
        try {
            if (! ($profile = $this->get(self::USER_PROFILE_HANDLER)->get($id))) {
                $statusCode = Codes::HTTP_CREATED;
                $profile = $this->get(self::USER_PROFILE_HANDLER)->post($slug, $request->request->all());
            } else {
                $statusCode = Codes::HTTP_NO_CONTENT;
                $profile->setUpdatedAt(new \DateTime());
                $profile = $this->get(self::USER_PROFILE_HANDLER)->put($profile, $request->request->all());
            }
            
            $routeOptions = array(
                'slug' => $profile->getId(),
                'id' => $profile->getId(),
                '_format' => $request->get('_format')
            );
            
            return $this->routeRedirectView('api_get_user_profile', $routeOptions, $statusCode);
        } catch (InvalidFormException $e) {
            return $e->getForm();
        }
    }

    protected function getOr404($id)
    {
        if (! ($profile = $this->get(self::USER_PROFILE_HANDLER)->get($id))) {
            throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.', $id));
        }
        
        return $profile;
    }
}