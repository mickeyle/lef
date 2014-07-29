<?php
namespace Api\FileBundle\Model;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class PhotoUpload
{

    /**
     *
     * @var int 1:avatar|2:post
     */
    public $type;

    /**
     * @var UploadedFile
     */
    public $file;
}