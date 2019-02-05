<?php

namespace App\Controllers;
use Framework\BaseController;

class OrderController extends BaseController
{

    public function OrderGET()
    {
        return $this->view("User/order.html");
    }
    public function OrderPOST()
    {
        $_SESSION["Errors"] = false;
        if(!$_SESSION["email"]){
            header("/Order/post");
        }
    }
    
}