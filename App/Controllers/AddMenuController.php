<?php

namespace App\Controllers;
use Framework\BaseController;

class AddMenuController extends BaseController
{

    public function AddMenuGET()
    {
        return $this->view("Admin/addmenu.html");
    }
    public function AddMenuPOST()
    {
      /*  $_SESSION["Errors"] = false;
        if(!$_SESSION["email"]){
            header("/AddMenu/post");
        }*/
        $pizza =  $_POST["pizza"];
        $weight = $_POST["weight"];
        $ingredients = $_POST["ingredients"];
        $price = $_POST["price"];
        //$tip=$_POST["tip"];
     
        
        $_SESSION["Errors"] = "";

        /*if (!$this->isPizzaTaken($pizza)) {
            $userModel = new Pizza();
            $userModel->menu($pizza, $weight, $ingredients, $price);
            $_SESSION["email"] = $email;
            $_SESSION["Errors"] = false;
         
        // header("Location: /login");
         echo("Succes");

        } else {echo("nu");
           // header("Location: /register");

        }*/
        echo("Succes");
    }
        /*logica
        private function isPizzaTaken(string $pizza): bool
        {
            $pizza = new Pizza();
    
            if ($pizza->pizzaExists($pizza == false)) {
    
                return false;
            }
            $_SESSION["Errors"] .= "pizza allready exists";
            return true;*/
        }
        
   




