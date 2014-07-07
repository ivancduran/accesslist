<?php

namespace accesslist;

use Phalcon\Mvc\User\Component,
    Phalcon\Acl;

class Access extends Component
{
    public $acl;
    public $roles;
    public $privateResources;

    public function __construct(){

        include_once __DIR__.'/List.php';

        $this->acl = new \Phalcon\Acl\Adapter\Memory();
        $this->acl->setDefaultAction(\Phalcon\Acl::DENY);

        //Register roles
        foreach ($allowList as $key => $value) {
            $this->roles[] = $key;
            $this->acl->addRole(new \Phalcon\Acl\Role($key));

            // Private Resource
            foreach ($value as $k => $v) {
                $this->privateResources[$k] = $v;
                $this->acl->addResource(new \Phalcon\Acl\Resource($k), $v);

                // List Actions and Allow
                foreach ($v as $s) {
                    $this->acl->allow($key, $k, $v);
                }
            }
        }

    }

    public function check($role=null){
        
        if ($role!=null) {
            $filter = new \Phalcon\Filter();
            $role = $filter->sanitize($role, "string");

            $ControllerName = \Phalcon\DI::getDefault()->get('dispatcher')->getControllerName();
            $ActionName = \Phalcon\DI::getDefault()->get('dispatcher')->getActionName();

            if ($this->acl->isAllowed($role, $ControllerName, $ActionName)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }


}