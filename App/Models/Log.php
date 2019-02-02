<?php
/**
 * Created by PhpStorm.
 * User: Dodo
 * Date: 1/30/2019
 * Time: 11:15 AM
 */

namespace App\Models;


use Framework\Model;

class Log extends Model
{
    protected $user = "user";

    public function addLog(string $text)
    {
        $data = ['text' => $text];
        $this->new($data);
    }
}