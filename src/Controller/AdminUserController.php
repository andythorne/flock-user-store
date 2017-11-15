<?php

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController;

/**
 * Class AdminUserController.
 *
 * @author andy@andy-thorne.co.uk
 */
class AdminUserController extends AdminController
{
    /**
     * {@inheritdoc}
     */
    protected function createNewEntity()
    {
        return $this->get('fos_user.user_manager')->createUser();
    }

    /**
     * {@inheritdoc}
     */
    protected function prePersistEntity($entity)
    {
        $this->get('fos_user.user_manager')->updateUser($entity, false);
    }

    /**
     * {@inheritdoc}
     */
    public function preUpdateEntity($entity)
    {
        $this->get('fos_user.user_manager')->updateUser($entity, false);
    }
}
