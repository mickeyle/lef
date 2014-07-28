<?php
namespace Api\FileBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Util\Codes;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Api\CommonBundle\Exception\InvalidFormException;

class PhotoController extends FOSRestController
{

    /**
     * 上传图片
     *
     * @ApiDoc(
     * resource = true,
     * input = "Api\FileBundle\Model\PhotoUpload",
     * statusCodes = {
     * 201 = "Returned when successful",
     * 400 = "Returned when the form has errors"
     * }
     * )
     *
     * @Annotations\View( statusCode = Codes::HTTP_BAD_REQUEST )
     *
     * @param Request $request
     *            请求对象
     * @param int $userId
     *            上传图片用户ID
     * @return FormTypeInterface View
     */
    public function postPhotoAction(Request $request, $userId)
    {
        try {
            $newPhoto = $this->get('api_file.photo_handler')->post($request->request->all() + $request->files->all());
            $routeOptions = array(
                'id' => 1,
                '_format' => $request->get('_format')
            );
            
            return $this->routeRedirectView('api_get_photo', $routeOptions, Codes::HTTP_CREATED);
        } catch (InvalidFormException $ex) {
            return $ex->getForm();
        }
    }
}