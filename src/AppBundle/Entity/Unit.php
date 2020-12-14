<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table()
 */
class Unit
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

		/**
	* @ORM\OneToMany(targetEntity="User", mappedBy="author", cascade={"persist"})
	*/
 	private $members;

	public function __construct()
	{
			$this->members = new ArrayCollection();
	}


 public function getMembers()
 {
		 return $this->author;
 }

 public function addMember(User $user)
 {
		 $this->members += $user;
 }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
