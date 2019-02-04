<?php

namespace App\Models;

use Framework\Model;

class User extends Model
{
    //we have to set specify the corresponding model for the table
    protected $table = "user";

    public function checkUser(string $email, string $pass)
    {
        $result = $this->getByParams(["email" => $email]);

        if ($result && password_verify($pass, $result->password))
            return $result;

    }
   /* public function checkType(string $type)
    {
        $result =$this->getByParams(["tip"=>$type]);
        
        return $result;
    }
*/

    public function updateUser($username, $firstname, $lastname,  $phone){
        $db = $this->newDbCon();

        $email = $_SESSION["email"];
        $user=$this->getByEmail($email);
        $password = $user->password;
        $where=['email' => $email];
        $data = ['username' => $username, 'password' => $password,'firstname' => $firstname,'lastname' => $lastname , 'phone' => $phone];
        $this->update($where,$data);
    }


    public function getByEmail(string $email)
    {
        $result = $this->getByParams(["email" => $email]);

        return $result;
    }

    public function emailExists(string $email)
    {
        $result = $this->getByParams(["email" => $email]);
        if ($result) {
            return true;
        }
        return false;
    }

    public function register(string $username, string $password, string $firstname, string $lastname, string $phone, string $email)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $data = ['username' => $username, 'password' => $password,'firstname' => $firstname,'lastname' => $lastname , 'phone' => $phone, 'email' => $email];
        $this->new($data);
    }

}