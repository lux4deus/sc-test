<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="files")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\FileRepository")
 */
class FileEntity {
	
	/**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Пожалуйста, загрузите файл в одном из разрешенных форматов.")
     * @Assert\File(mimeTypes={ "application/pdf" })
     */
    private $dossier;
    
    /**
     * @ORM\Column(type="datetime")
     */
	private $created;
	
	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $name;

	public function __construct()
	{
		$this->setCreated(new \DateTime("now"));
		
		return $this;
	}
	
	public function getName()
	{
		return $this->name;
	}

	public function getCreated()
	{
		return $this->created;
	}
	
	public function setName($name)
	{
		$this->name = $name;
		
		return $this;
	}
	
	public function setCreated($date)
	{
		$this->created = $date;
		
		return $this;
	}
	
    public function getDossier()
    {
        return $this->dossier;
    }

    public function setDossier($dossier)
    {
        $this->dossier = $dossier;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
