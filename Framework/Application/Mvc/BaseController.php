<?php
/**
* BaseController, EVERY controller extends form this
*
* @author Flavio Kleiber <flaverkleiber@yahoo.de>
* @copyright 2016-2017 Flavio Kleiber
*/

namespace Solaria\Framework\Application\Mvc;

use Solaria\Framework\Core\DiClass;
use Solaria\Framework\View\Template;
use Solaria\Framework\Application\Rbac\Rbac;

class BaseController extends DiClass {

    protected $session;
    protected $view;
    protected $di;
    protected $rbac;

    public function __construct() {
        parent::__construct();
        $this->session = $this->di->get('Session');
        $this->view = new Template();
        //$this->setUpRbac(); !COMENT THIS OUT IF YOU USING A PERMISSION SYSTEM!
    }

    public function __destruct() {
        $this->view->render();
    }

    public function setUpRbac() {
        $rbcConf = $this->di->get('mainConf')['rbac'];
        $result = $rbcConf['roleTable']::findAll();
        $rbac = new Rbac();

        if(!empty($result) && $result != false) {
            foreach ($result as $role) {
                $rbac->addRole($role->getName());
                foreach ($role->getRolePermission() as $rp) {
                    $rbac->addPermissionToRole($role->getName(), $rp->getPermission()->getName());
                }
            }
        }

        $this->rbac = $rbac;
        $this->di->set('Rbac', $rbac);
    }

}
