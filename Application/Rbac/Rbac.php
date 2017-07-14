<?php
/**
* Rbac wrapper for zend module
*
* @author Flavio Kleiber <flaverkleiber@yahoo.de>
* @copyright 2016-2017 Flavio Kleiber
*/
namespace Solaria\Framework\Application\Rbac;

use Solaria\Framework\Core\DiClass;
use Zend\Permissions\Rbac\Rbac as Zend_Rbac;
use Zend\Permissions\Rbac\Role;

class Rbac extends DiClass{

    private $rbac;

    public function __construct() {
        $this->rbac = new Zend_Rbac();
    }

    public function addRole($name) {
        $this->rbac->addRole(new Role($name));
    }

    public function isGranted($role, $permission) {
        return $this->rbac->isGranted($role, $permission);
    }

    public function addPermissionToRole($role, $permission) {
        $this->rbac->getRole($role)->addPermission($permission);
    }

}
