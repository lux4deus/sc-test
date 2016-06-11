<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\UserRepository")
 */
class File
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="varchar", length=255, unique=true)
     */
    private $filename;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $loaded = "CURRENT_TIMESTAMP";

    /**
     * @ORM\Column(type="varchar", length=255, unique=true)
     */
    private $type;

    /**
     * @ORM\Column(type="varchar", length=255, unique=true)
     */
    private $ext;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    public function __construct()
    {
        $this->status = true;
    }

    public function get()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRoles()
    {
        return (array)unserialize($this->roles);
    }

    public function eraseCredentials()
    {
    }
    
    public function getSalt()
    {
		return null;
	}

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            $this->roles,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            $this->roles
        ) = unserialize($serialized);
    }
}
