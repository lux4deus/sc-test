<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FileController extends Controller
{
    /**
     * @Route("/file/list", name="file_list")
     */
    public function listAction(Request $request)
    {
		if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) throw $this->createAccessDeniedException("Доступ запрещен.");
		
        $request = new Request();
        // replace this example code with whatever you need
        return $this->render('default/file_list.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }
    
    public function addAction(Request $request)
    {
		if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) throw $this->createAccessDeniedException("Доступ запрещен.");
		
        $request = new Request();
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }
	
    public function addProccessAction(Request $request)
    {
		if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) throw $this->createAccessDeniedException("Доступ запрещен.");
		
        $request = new Request();
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }
}
