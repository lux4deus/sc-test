<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\LoginType;
use AppBundle\Entity\User;

class UserController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function loginAction(Request $request)
    {
		if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) return $this->redirectToRoute('file_list');
		
		$user = new User();
		$form = $this->createForm(LoginType::class, $user, [
			'action' => $this->generateUrl("login"),
			'method' => "POST",
		]);
		
		$autils = $this->get('security.authentication_utils');
		
		$error = $autils->getLastAuthenticationError();
		$lastUserName = $autils->getLastUsername();
		
        // replace this example code with whatever you need
        return $this->render('default/login.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
            'error' => $error,
            'last_username' => $lastUserName,
            'form' => $form->createView(),
        ]);
    }
    
    public function logoutAction(Request $request)
    {
		
		return $this->redirectToRoute("login");
	}
    
    public function registerAction(Request $request)
    {
		
		return $this->redirectToRoute("login");
	}
}
