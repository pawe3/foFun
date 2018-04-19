<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10.04.2018
 * Time: 14:54
 */

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    private $avatar_fn;

    /**
     * @ORM\OneToMany(targetEntity="Post", mappedBy="fos_user")
     */
    private  $posts;
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * @return mixed
     */
    public function getAvatarFn()
    {
        return $this->avatar_fn;
    }

    /**
     * @param mixed $avatar_fn
     */
    public function setAvatarFn($avatar_fn)
    {
        $this->avatar_fn = $avatar_fn;
    }

    public function _construkt(){
        $this->posts = new ArrayCollection();
    }
}