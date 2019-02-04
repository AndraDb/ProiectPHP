<?php

namespace App\Controllers;
use Framework\BaseController;

class AddMenuController extends BaseController
{

    public function AddMenuGET()
    {
        return $this->view("user/addmenu.html");
    }
    public function AddMenuPOST()
    {
        $_SESSION["Errors"] = false;
        if(!$_SESSION["email"]){
            header("/AddMenu/post");
        }
    }
}