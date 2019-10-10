<?php


namespace app\models;


use yii\db\ActiveRecord;

class UserRecord extends ActiveRecord
{
   public static function  tableName()
   {
       return "user";
   }
   public function setTestuser()
   {
       $this->name = "John";
       $this->email = "eugeny70@gmail.com";
       $this->passhash = "HASH HASH";
       $this->status = 2;
   }
}