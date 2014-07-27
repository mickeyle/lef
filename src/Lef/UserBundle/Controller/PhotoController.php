<?php
namespace Lef\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Util\Codes;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Lef\UserBundle\Exception\InvalidFormException;

class PhotoController extends FOSRestController
{

    /**
     * Get user photo.
     *
     * @ApiDoc(
     * resource = true,
     * output = "Lef\UserBundle\Entity\Photo",
     * statusCodes = {
     * 200 = "Returned when successful",
     * 404 = "Returned when the user is not found"
     * }
     * )
     *
     * @Annotations\View(templateVar="photo")
     *
     * @param int $slug            
     * @param int $id            
     * @return array
     *
     * @throws NotFoundHttpException when page not exist
     */
    public function getPhotoAction($slug, $id)
    {
        $photo = $this->getOr404($id);
        
        return $photo;
    }

    /**
     * Upload a new photo.
     *
     * @ApiDoc(
     * resource = true,
     * input = "Lef\UserBundle\Form\PhotoType",
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
    public function postPhotoAction(Request $request, $slug)
    {
        try {
            $newPhoto = $this->get('lef_user.photo.handler')->post($slug, $request->files->all());
            $routeOptions = array(
                'slug' => $slug,
                'id' => $newPhoto->getId(),
                '_format' => $request->get('_format')
            );
            
            return $this->routeRedirectView('api_3_get_user_photo', $routeOptions, Codes::HTTP_CREATED);
        } catch (InvalidFormException $e) {
            return $e->getForm();
        }
    }

    /**
     * Remove a photo
     *
     * @ApiDoc(
     * resource = true,
     * statusCodes = {
     * 204 = "Returned when successful",
     * 400 = "Returned when the form has errors"
     * }
     * )
     *
     * @param int $slug            
     * @param int $id            
     */
    public function deletePhotoAction($slug, $id)
    {
        if ($this->get('lef_user.photo.handler')->delete($slug, $id))
            return $this->view(null, Codes::HTTP_NO_CONTENT);
        else
            return $this->view(null, Codes::HTTP_BAD_REQUEST);
    }

    protected function getOr404($id)
    {
        if (! ($photo = $this->get('lef_user.photo.handler')->get($id))) {
            throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.', $id));
        }
        
        return $photo;
    }
}

