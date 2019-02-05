<?php

namespace App\Models;

use Framework\Model;

class Pizza extends Model
{
    //we have to set specify the corresponding model for the table
    protected $table = "menu";

   /*public function checkUser(string $email, string $pass)
    {
        $result = $this->getByParams(["email" => $email]);

        
    }*/
   /* public function checkType(string $type)
    {
        $result =$this->getByParams(["tip"=>$type]);
        
        return $result;
    }
*/

    public function updateMenu($pizza, $weight, $ingredients,  $price){
        $db = $this->newDbCon();

        $pizza = $_SESSION["pizza"];
        $pizza=$this->getByName($pizza);
        $price = $pizza->price;
        $where=['pizza' => $pizza];
        $data = ['pizza' => $pizza, 'weight' => $weight,'ingredients' => $ingredients,'price' => $price];
        $this->update($where,$data);
    }




    public function menu(string $pizza, string $weight, string $ingredients, string $price)
    {
       
        $data = ['pizza' => $pizza, 'weight' => $weight,'ingredients' => $ingredients,'price' => $price];
        $this->new($data);
    }
    public function getByName(string $pizza)
    {
        $result = $this->getByParams(["pizza" => $pizza]);

        return $result;
    }
}