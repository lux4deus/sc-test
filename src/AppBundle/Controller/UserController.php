<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function loginAction(Request $request)
    {
		if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) return $this->redirectToRoute('file_list');
		
		$autils = $this->get('security.authentication_utils');
		
		$error = $autils->getLastAuthenticationError();
		$lastUserName = $autils->getLastUsername();
		
        $request = new Request();
        // replace this example code with whatever you need
        return $this->render('default/login.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
            'error' => $error,
            'last_username' => $lastUserName,
        ]);
    }
}
