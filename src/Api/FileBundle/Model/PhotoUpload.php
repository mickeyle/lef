<?php
namespace Api\FileBundle\Model;

class PhotoUpload
{

    /**
     *
     * @var int 1:avatar|2:post
     */
    public $type;

    public $file;
}