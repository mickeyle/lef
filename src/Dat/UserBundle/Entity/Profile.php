<?php
namespace Dat\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profile
 *
 * @ORM\Table(name="profile")
 * @ORM\Entity(repositoryClass="Dat\UserBundle\Entity\ProfileRepository")
 */
class Profile
{

    /**
     *
     * @var integer @ORM\Column(name="id", type="integer")
     *      @ORM\Id
     */
    private $id;

    /**
     *
     * @var string @ORM\Column(name="gender", type="string", length=8, nullable=true)
     */
    private $gender;

    /**
     *
     * @var \DateTime @ORM\Column(name="birthday", type="date", nullable=true)
     */
    private $birthday;

    /**
     *
     * @var \DateTime @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * Set id
     *
     * @param integer $id            
     * @return Profile
     */
    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set gender
     *
     * @param integer $gender            
     * @return Profile
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        
        return $this;
    }

    /**
     * Get gender
     *
     * @return integer
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday            
     * @return Profile
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
        
        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt            
     * @return Profile
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
