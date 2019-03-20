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

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Route\RouteCollection;

class BasketAdmin extends AbstractAdmin {
	protected $baseRouteName = 'basket';
	protected $baseRoutePattern = 'basket';
	protected $translationDomain = 'SonataBasketBundle';
	
	/**
	 * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
	 */
	public function configureFormFields(FormMapper $formMapper): void {
		
		
		$formMapper->with('basket.group.addresses')
			->add('name')
			->add('customer', ModelListType::class, [
				'btn_add' => false,
				'btn_delete' => false,
			], [
				      'admin_code' => 'admin.address',
			      ])
		;
	}
	
	protected function configureRoutes(RouteCollection $collection) {
		$collection->remove('list');
		$collection->add('create_order', $this->getRouterIdParameter() . '/create-order');
	}
	
	public function prePersist($object) {
	}
	
}
