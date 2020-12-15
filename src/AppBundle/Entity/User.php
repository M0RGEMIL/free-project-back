<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
* @ORM\Entity
* @ORM\Table(name="user")
*/
class User
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*
	* @Serializer\Groups({"list"})
	*/
	private $id;

	/**
	* @ORM\Column(type="text")
	*
	* @Serializer\Groups({"detail", "list"})
	*/
	private $name;

	/**
	* @ORM\Column(type="text")
	*
	* @Serializer\Groups({"detail", "list"})
	*/
	private $password;

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}
}
