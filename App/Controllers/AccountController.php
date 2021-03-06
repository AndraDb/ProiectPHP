<?php

namespace App\Controllers;

use App\Models\User;
use Framework\BaseController;

class AccountController extends BaseController
{

    public function loginGET()
    {
        return $this->view("account/login.html");
    }

    public function loginPOST()
    {

        $email = $_POST["email"];
        $pass = $_POST["password"];
        //$types=$_POST["tip"];
        
        $userModel = new User();
        $result = $userModel->checkUser($email, $pass);
      //  $type=$userModel->checkType($types);
        
      
            if ($result) {
                if($email=='andra.dobritoiu97@gmail.com')
                {
                    $_SESSION["Errors"] = false;
                    $_SESSION["email"] = $result->email;

                   // header("/login/post");
                    header("Location: /AddMenu");
                 // echo("VAIAIAIAIAI");
                }
                    //echo("adadadadad0");
           else
           {
               //header("/login/post");
               header("Location: /MeniuClient");
           }

                } 
                else {
            $_SESSION["Errors"] = "invalid credentials";
            header("Location: /login");
            //echo("vai steaua ta");
                }
           
           
        
    
}

    public function registerGET()
    {
        return $this->view("account/register.html");
    }

    public function registerPOST()
    {
        $username =  $_POST["username"];
        $password = $_POST["password"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        //$tip=$_POST["tip"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $_SESSION["Errors"] = "";

        if ($this->isValidFormData($firstname, $lastname, $email, $password) && !$this->isEmailTaken($email)) {
            $userModel = new User();
            $userModel->register($username, $password, $firstname, $lastname, $phone, $email);
            $_SESSION["email"] = $email;
            $_SESSION["Errors"] = false;
         
         header("Location: /login");
         //echo("Succes");

        } else {
            header("Location: /register");
        }
    }

    public function logout()
    {
        session_destroy();

        header("Location: /login");
    }

    //logica
    private function isEmailTaken(string $email): bool
    {
        $user = new User();

        if ($user->emailExists($email == false)) {

            return false;
        }
        $_SESSION["Errors"] .= "email allready exists";
        return true;
    }

    public function isNameValid($username): bool
    {
        if (!isset($username) || strlen($username) < 2) {
            $_SESSION["Errors"] .= "names cant have less than 2 characters";
            return false;
        }
        return true;
    }

    private function isEmailValid($email): bool
    {
        if (!isset($email) || strlen($email) < 255 || strpos('@', $email)) {
            $_SESSION["Errors"] .= "invalid email";
            return false;
        }
        return true;
    }


    public function isPasswordValid($password): bool
    {
        if (!isset($password) || strlen($password) < 6) {
            $_SESSION["Errors"] = "invalid password";
            return false;
        }
        return true;
    }
    public function isPasswordRepeatValid($passwordrepeat): bool
    {
        if (!isset($passwordrepeat) || strlen($passwordrepeat) < 6) {
            $_SESSION["Errors"] = "invalid password";
            return false;
        }
        return true;
    }


    private function isValidFormData(string $firstname, $lastname, $email, $password): bool
    {

        if ($this->isNameValid($firstname) && $this->isNameValid($lastname)) {
            //  if ($this->isEmailValid($email)) {
            if ($this->isPasswordValid($password)) {
                return true;
            }
            //   }
        }
        return false;
    }

}