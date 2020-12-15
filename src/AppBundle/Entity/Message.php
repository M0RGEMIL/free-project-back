<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
* @ORM\Entity
* @ORM\Table
*/
class Message
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
	private $text;

	/**
	* @ORM\Column(type="text")
	*/
	private $author;

	/**
	* @ORM\ManyToOne(targetEntity="Chat", cascade={"all"}, fetch="EAGER")
	*/
	private $chat;

	public function getID()
	{
		return $this->id;
	}

	public function getText()
	{
		return $this->text;
	}

	public function setText($text)
	{
		$this->text = $text;
	}

	public function getAuthor()
	{
		return $this->author;
	}

	public function setAuthor($author)
	{
		$this->author = $author;
	}

	public function getChat()
	{
		return $this->chat;
	}

	public function setChat($chat)
	{
		$this->chat = $chat;
	}
}
