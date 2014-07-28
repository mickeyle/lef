<?php
namespace Api\FileBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Util\Codes;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class PhotoController extends FOSRestController
{

    /**
     * 上传图片
     *
     * @ApiDoc(
     * resource = true,
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
     * @param int $type
     *            1:avatar|2:post
     * @return FormTypeInterface View
     */
    public function postPhotoAction(Request $request, $userId, $type)
    {}
}