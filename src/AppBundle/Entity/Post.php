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
 * @ORM\Table(name="posty")
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

     /**
     * @ORM\Column(type="string")
     */
     private $tresc;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

     /**
      * @ORM\ManyToOne(targetEntity="User", inversedBy="posts")
      * @ORM\JoinColumn(name="id", referencedColumnName="id")
      */
     private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Topic", inversedBy="posts")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     */
    private $nazwaTemat;

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
    public function getTresc()
    {
        return $this->tresc;
    }

    /**
     * @param mixed $tresc
     */
    public function setTresc($tresc)
    {
        $this->tresc = $tresc;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
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
}