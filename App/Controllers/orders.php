<?php
namespace App\Controllers;
use App\Models\Image;
use App\Models\Order;
use App\Models\Ordertofood;
use App\Models\Restaurant;
use App\Models\User;
use App\Models\Food;
use App\Models\Cart;
use App\Models\Log;
use Framework\BaseController;
//require 'autoload.php';
//require 'Helpers.php';
class FoodController extends BaseController
{
    public function menuGET()
    {
        $_SESSION["Errors"] = false;
        if(!isset($_SESSION["email"])){
            header("Location: /login");
            die();
        }
        $user = new User();
        $user = $user->getByEMail($_SESSION["email"]);
       // $restaurantModel=new ();
        if(!isset($_SESSION["restaurantid"]))
        {
            $_SESSION["restaurantid"]=$_GET['id'];
        }
        else
        {
            $cartmodel=new Cart();
            $cartmodel->addEntry($user->id,$_GET['id']);
        }
        $restaurant=$restaurantModel->get($_SESSION["restaurantid"]);
        $foodModel=new Food();
        $imageModel=new Image();
        $result=$foodModel->getAll();
        $count=0;
        $values=[];
        if(isset($result->id))
        {
            if($result->restaurantid==$restaurant->id)
            {
                $count=1;
                $image = $imageModel->getById($result->imageid);
                $values=$result;
                $values->imagepath=$image->path;
            }
        }
        else {
            foreach ($result as $value) {
                if($value->restaurantid==$restaurant->id)
                {
                    $count+=1;
                    $image = $imageModel->getById($value->imageid);
                    $obj=$value;
                    $obj->imagepath=$image->path;
                    array_push($values,$obj);
                }
            }
        }
        return $this->view("orders/menu.html",["user" => $user,"count"=>$count,"values"=>$values ]);
    }
    public function menuPOST()
    {
        header("Location: /menu");
    }
    public function addfoodGET()
    {
        return $this->view("admin/addfood.html");
    }
    public function addfoodPOST()
    {
        $imageModel=new Image();
        $foodModel=new Food();
        $foodname=$_POST["name"];
        $fooddescription=$_POST["description"];
        $foodprice=$_POST["price"];
        $restaurantid=$_SESSION['restaurantid'];
        $fileName=$_FILES["fileToUpload"]["name"];
        $fileTmpName=$_FILES["fileToUpload"]["tmp_name"];
        $fileSize=$_FILES["fileToUpload"]["size"];
        $fileError=$_FILES["fileToUpload"]["error"];
        $fileType=$_FILES["fileToUpload"]["type"];
        $fileExt=explode('.',$fileName);
        $fileActExt=strtolower(end($fileExt));
        $allowed=array("jpg","jpeg","png");
        if(in_array($fileActExt,$allowed))
        {
            if($fileError===0)
            {
                if($fileSize<1000000)
                {
                    $image=base64_encode(file_get_contents($_FILES["fileToUpload"]["tmp_name"]));
                    $options=array('http'=>array('method'=>"POST",'header'=>"Authorization: Bearer c94d0d9fdf22db9c7c344b85791ebd9fbacf1837","Content-Type: application/x-www-form-urlencoded",'content'=>$image));
                    $context=stream_context_create($options);
                    $imgurURL="https://api.imgur.com/3/image";
                    $response=file_get_contents($imgurURL,false,$context);
                    $response=json_decode($response);
                    $uid=uniqid('',true).".".$fileActExt;
                    $target_file=$response->data->link;
                    if(!$imageModel->pathExists($target_file) && !$foodModel->nameExists($foodname,$restaurantid)) {
                        $imageModel->addImage($target_file,$uid);
                        $id=$imageModel->getByPath($target_file)->id;
                        $foodModel->addFood($foodname,$fooddescription,$foodprice,$restaurantid,$id);
                    }
                    else
                    {
                        echo("Image or restaurant already exists");
                    }
                }
                else
                {
                    echo("File too big");
                }
            }
            else
            {
                echo("Error at upload");
            }
        }
        else{
            echo("File type not allowed");
        }
        header("Location: /addfood");
    }
    public function cartGET()
    {
        $_SESSION["Errors"] = false;
        if(!$_SESSION["email"]){
            header("Location: /login");
            die();
        }
        if(isset($_GET['id']))
        {
            if($_GET['id']==100000)
            {
                header("Location: /cart/post");
            }
            else
            {
                $cart=new Order();
                $cart->update(["id"=>$_GET['id']],["status"=>"resolved"]);
            }
        }
        $user = new User();
        $user = $user->getByEMail($_SESSION["email"]);
       // $restaurantModel=new Restaurant();
        $cart=new Order();
        $foodModel=new Food();
        $result=$cart->getAll();
        $count=0;
        $values=[];
        $totalsum=0;
        if(isset($result->id))
        {
            if($result->iduser==$user->id)
            {
                if($result->status=='unresolved')
                {
                    $count=1;
                    $obj=$result;
                    $food=$foodModel->getById($result->idfood);
                    $obj->foodname=$food->name;
                    $obj->fooddesc=$food->description;
                    $obj->foodprice=$food->price;
                    array_push($values,$obj);
                }
            }
        }
        else {
            foreach ($result as $value) {
                if($value->iduser==$user->id)
                {
                    if($value->status=='unresolved')
                    {
                        $count+=1;
                        $obj=$value;
                        $food=$foodModel->getById($value->idfood);
                        $obj->foodname=$food->name;
                        $obj->fooddesc=$food->description;
                        $obj->foodprice=$food->price;
                        array_push($values,$obj);
                    }
                }
            }
        }
        if(!$count==0)
        {
            $totalsum=$cart->getTotalSum($user->id);
        }
        return $this->view("orders/cart.html",["user" => $user,"count"=>$count,"values"=>$values,"totalsum"=> $totalsum]);
    }
    public function cartPOST()
    {
        $user = new User();
        $user = $user->getByEMail($_SESSION["email"]);
        $id=$user->id;
        $cart=new Cart();
        $cart->order($id);
        header("Location: /show");
    }
}