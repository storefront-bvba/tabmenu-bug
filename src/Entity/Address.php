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

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\AddressRepository")
 */
class Address
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
	 * @ORM\ManyToOne(targetEntity="App\Entity\Customer", inversedBy="addresses")
	 * @var $customer
	 */
    protected $customer;

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

	/**
	 * @return mixed
	 */
	public function getCustomer() {
		return $this->customer;
	}

	/**
	 * @param mixed $customer
	 */
	public function setCustomer($customer): void {
		$this->customer = $customer;
	}
}
