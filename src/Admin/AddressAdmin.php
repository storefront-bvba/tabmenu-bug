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
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class AddressAdmin extends AbstractAdmin
{
	protected $baseRouteName = 'address';
	protected $baseRoutePattern = 'address';
    protected $translationDomain = 'SonataCustomerBundle';

    public function configure(): void
    {
        $this->parentAssociationMapping = 'customer';
    }

    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     */
    public function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            ->with('address.form.group_contact_label', [
                'class' => 'col-md-7',
            ])
                ->add('name')
            ->end()
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $list
     */
    public function configureListFields(ListMapper $list): void
    {
        $list
            ->addIdentifier('name')
        ;
    }
}
