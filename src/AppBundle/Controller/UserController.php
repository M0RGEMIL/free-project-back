<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route("/users/getUser/{id}", name="user_show")
		 * @Method({"GET"})
     */
    public function getUserInfos()
    {
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
				$user = new User();
				$user->setName('test User');
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
