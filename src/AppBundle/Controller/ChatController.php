<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Chat;
use AppBundle\Entity\Message;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use JMS\Serializer\SerializationContext;

class ChatController extends Controller
{

	/**
	* @Route("/chat/{id}/addMessage", name="message_add")
	* @Method({"POST"})
	*/
	public function addMessage(Request $request)
	{
		$message = new Message();
	}

	/**
	* @Route("/chat/{id}/delMessage/{mid}", name="message_del")
	* @Method({"POST"})
	*/
	public function delMessage(Request $request)
	{
	}

	/**
	* @Route("/chat/{id}/getMessages", name="message_get")
	* @Method({"GET"})
	*/
	public function getMessage()
	{
		$messages = $this->getDoctrine()->getRepository('AppBundle:Message')->findAll();
		$data = $this->get('jms_serializer')->serialize($messages, 'json', SerializationContext::create()->setGroups(array('list')));

		$response = new Response($data);
		$response->headers->set('Content-Type', 'application/json');

		return $response;
	}
}
