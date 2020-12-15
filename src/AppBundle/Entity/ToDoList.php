<?php

namespace AppBundle\Entity;

use AppBundle\Entity\ToDo;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
* @ORM\Entity
* @ORM\Table(name="user")
*/
class ToDoList
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
}
