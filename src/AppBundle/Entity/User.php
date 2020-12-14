<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table()
 *
 */
class User
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $password;

    // /**
    //  * @ORM\ManyToOne(targetEntity="Unit",cascade={"all"}, fetch="EAGER")
    //  */
		/**
		 * @ORM\Column(type="text")
		 */
    private $unit;

    public function __construct()
    {
        // $this->units = new ArrayCollection();
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getUnits()
    {
        return $this->units;
    }

		public function setUnits($units)
		{
				$this->units = $units;
		}
}
