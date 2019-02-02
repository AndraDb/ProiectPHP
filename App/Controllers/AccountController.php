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
        $userModel = new User();
        $result = $userModel->checkUser($email, $pass);
        if ($result) {
            $_SESSION["Errors"] = false;
            $_SESSION["email"] = $result->email;
            header("Location: /restaurants");

        } else {
            $_SESSION["Errors"] = "invalid credentials";
            header("Location: /login");
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
        $firstname = $_POST["FirstName"];
        $lastname = $_POST["LastName"];
        $phone = $_POST["Phone"];
        $email = $_POST["email"];
        $_SESSION["Errors"] = "";

        if ($this->isValidFormData($firstname, $lastname, $email, $password) && !$this->isEmailTaken($email)) {
            $userModel = new User();
            $userModel->register($username, $password, $firstname, $lastname, $phone, $email);
            $_SESSION["email"] = $username;
            $_SESSION["Errors"] = false;
            header("Location: /restaurants");

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
    private function isEmailTaken(string $username): bool
    {
        $user = new User();

        if ($user->emailExists($username) == false) {

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

    //aici trebuie si repeat password
    public function isPasswordValid($password): bool
    {
        if (!isset($password) || strlen($password) < 6) {
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