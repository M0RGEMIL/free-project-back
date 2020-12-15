<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Message;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Table(name="user")
*/
class Chat
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	private $id;

	/**
	* @ORM\Column(type="text")
	*/
	private $name;

	/**
	* @ORM\OneToMany(targetEntity="Message", mappedBy="user", cascade={"persist"})
	*/
	private $messages = [];

	public function __construct()
	{
			$this->messages = new ArrayCollection();
	}

	public function getID()
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
	}

	public function getMessages()
	{
		return $this->messages;
	}

	public function addMessage($author)
	{
		$this->author = $author;
	}
}
