<?php


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