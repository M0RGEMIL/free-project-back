<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Unit;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use JMS\Serializer\SerializationContext;

class UnitController extends Controller
{

	/**
	* @Route("/users/getUsers", name="users_show")
	* @Method({"GET"})
	*/
	public function getUsers()
	{
		$articles = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();
		$data = $this->get('jms_serializer')->serialize($articles, 'json', SerializationContext::create()->setGroups(array('list')));

		$response = new Response($data);
		$response->headers->set('Content-Type', 'application/json');

		return $response;
	}

	/**
	* @Route("/users/getUser/{id}", name="user_show")
	* @Method({"GET"})
	*/
	public function getUserInfos()
	{
			//ici mettre recuperation d'un USER en fonction de l'ID envoyé

		$user = new User();
		$user->setName('test User');
		$user->setPassword('azerty1234');

		$data =  $this->get('serializer')->serialize($user, 'json');

		$response = new Response($data);
		$response->headers->set('Content-Type', 'application/json');

		return $response;
	}

	/**
	* @Route("/users/signin", name="user_get")
	* @Method({"POST"})
	*/
	public function getUserID()
	{

		//ici mettre recuperation d'un USER en fonction des identifiants

		$user = new User();
		$user->setName('test');
		$user->setPassword('azerty1234');

		$data =  $this->get('serializer')->serialize($user, 'json');

		$response = new Response($data);
		$response->headers->set('Content-Type', 'application/json');

		return $response;
	}

	/**
	* @Route("/users/signup", name="user_create")
	* @Method({"POST"})
	*/
	public function createUser(Request $request)
	{
		$data = $request->getContent();
		$user = $this->get('serializer')->deserialize($data, 'AppBundle\Entity\User', 'json');

		$em = $this->getDoctrine()->getManager();
		$em->persist($user);
		$em->flush();

		return new Response('', Response::HTTP_CREATED);
	}

}
