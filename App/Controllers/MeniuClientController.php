<?php

namespace App\Controllers;
use Framework\BaseController;

class MeniuClientController extends BaseController
{

    public function meniuClientGET()
    {
        return $this->view("user/MeniuClient.html");
    }
    public function meniuClientPOST()
    {
        $_SESSION["Errors"] = false;
        if(!$_SESSION["email"]){
            header("/MeniuClient/post");
        }
    }
}