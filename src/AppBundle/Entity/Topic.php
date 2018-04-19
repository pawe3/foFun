<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.04.2018
 * Time: 13:52
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="temat")
 */
class Topic
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */private $id;

    /**
     * @ORM\Column(type="string")
     */private $nazwaTemat;
    /**
     * @ORM\Column(type="string")
     */private $shortOpis;
    /**
     * @ORM\OneToMany(targetEntity="Post", mappedBy="temat")
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

    /**
     * @return mixed
     */
    public function getNazwaTemat()
    {
        return $this->nazwaTemat;
    }

    /**
     * @param mixed $nazwaTemat
     */
    public function setNazwaTemat($nazwaTemat)
    {
        $this->nazwaTemat = $nazwaTemat;
    }

    /**
     * @return mixed
     */
    public function getShortOpis()
    {
        return $this->shortOpis;
    }

    /**
     * @param mixed $shortOpis
     */
    public function setShortOpis($shortOpis)
    {
        $this->shortOpis = $shortOpis;
    }

    /**
     * @return mixed
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * @param mixed $posts
     */
    public function setPosts($posts)
    {
        $this->posts = $posts;
    }

    public function _construkt(){
        $this->posts = new ArrayCollection();
    }
}