<?php

declare(strict_types=1);

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CustomerRepository")
 */

class Customer
{
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @ORM\Column(type="integer")
	 */
	protected $id;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $name;

	/**
	 * @ORM\OneToMany(targetEntity="App\Entity\Address", mappedBy="customer", cascade={"persist"})
	 * @var $customer
	 */
	protected $addresses;

	public function __construct()
    {
        $this->addresses = new ArrayCollection();
    }

    /**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id): void {
		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName(string $name): void {
		$this->name = $name;
	}

	public function addAddress(Address $address) {
	    $address->setCustomer($this);
		$this->addresses->add($address);
	}

	public function removeAddress(Address $address) {
		$this->addresses->remove($address);
	}

	public function getAddresses() {
		return $this->addresses;
	}
}
