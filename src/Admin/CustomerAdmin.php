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

use Knp\Menu\ItemInterface as MenuItemInterface;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;

class CustomerAdmin extends AbstractAdmin
{
	protected $baseRouteName = 'customer';
	protected $baseRoutePattern = 'customer';
	
    public function configure(): void
    {
        $this->setTranslationDomain('SonataCustomerBundle');
    }

    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     */
    public function configureFormFields(FormMapper $formMapper): void
    {

        $formMapper
            ->with('customer.group.general', [
                    'class' => 'col-md-7',
                ])
                ->add('name')
	        ->add('address', ModelListType::class, [
		        'btn_add' => false,
		        'btn_delete' => false,
	        ], [
		              'admin_code' => 'admin.address',
	              ])
            ->end()
        ;
    }
	
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper->add('name');
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

    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null): void
    {
        if (!$childAdmin && !\in_array($action, ['edit'], true)) {
            return;
        }

        $admin = $this->isChild() ? $this->getParent() : $this;

        $id = $admin->getRequest()->get('id');

        $menu->addChild(
            'customer.sidemenu.link_address_list',
            $admin->generateMenuUrl('admin.address.list', ['id' => $id])
        );
    }
	
	
}
