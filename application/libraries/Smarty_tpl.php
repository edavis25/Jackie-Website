<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
//smarty class

require BASEPATH . "../../../smarty/smarty/libs/Smarty.class.php";

class Smarty_tpl extends Smarty {

    function __construct() {
        parent::__construct();

        $smarty_dir = BASEPATH . "../../../smarty/smarty/libs/";
 
        $this->setTemplateDir(APPPATH . "views/templates");
        $this->setCompileDir(APPPATH . "views/templates_c");
        $this->setCacheDir(APPPATH . "views/cache");
        $this->setConfigDir(APPPATH . "views/config");
        $this->setPluginsDir(array("$smarty_dir/plugins", "$smarty_dir/sysplugins/"));
        $this->compile_check = true;
        $this->force_compile = true;
        $this->caching = true;
        $this->cache_lifetime = 86400;
    }

}
