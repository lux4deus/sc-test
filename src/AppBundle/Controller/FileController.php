<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\FileEntity;
use AppBundle\Form\FilesType;

class FileController extends Controller
{
    /**
     * @Route("/file/list", name="file_list")
     */
    public function listAction(Request $request)
    {
		$files = $this->getDoctrine()->getRepository("AppBundle:FileEntity")->findAll();
		
        $request = new Request();
        // replace this example code with whatever you need
        return $this->render('default/file_list.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
            'files' => $files
        ]);
    }
    
    public function addAction(Request $request)
    {
		$file = new FileEntity();
		$form = $this->createForm(FilesType::class, $file);
		
		$form->handleRequest($request);
		if ($form->isSubmitted()&&$form->isValid())
		{
            $fileObject = $file->getDossier();
			$fileName = $this->get('app.file_uploader')->upload($fileObject);

			$file->setDossier($fileName);
			$file->setName($fileObject->getClientOriginalName());
			
			$db = $this->getDoctrine()->getManager();
			$db->persist($file);
			$db->flush();
            
			return $this->redirectToRoute("file_list");
		}
		
        $request = new Request();
        // replace this example code with whatever you need
        return $this->render('default/file_add.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
            'form' => $form->createView(),
        ]);
    }
	
    public function addProccessAction(Request $request)
    {
        $request = new Request();
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }
}
