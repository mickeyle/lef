<?php
namespace Biz\ApiBundle\Model;

class UserAvatar
{

    private $file;

    /**
     *
     * @return the $file
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     *
     * @param field_type $file            
     */
    public function setFile($file)
    {
        $this->file = $file;
    }
}