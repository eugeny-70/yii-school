<?php


namespace app\models;


use Faker\Factory;
use yii\db\ActiveRecord;

class UserRecord extends ActiveRecord
{
   public static function  tableName()
   {
       return "user";
   }
   public function setTestUser()
   {
       $faker = Factory::create();
       $this->name = $faker->name;
       $this->email = $faker->email;
       $this->setPassword($faker->password);
       $this->status = $faker->randomDigit;
   }
   public static function existsEmail(string $email ):bool
   {
       $count = static::find()->where(['email'=>'$email'])->count();
       return $count == 1;
   }

    public static function findUserByEmail($email)
    {
       return static::findOne(["email"=>$email]);

    }

    public function setUserJoinForm(UserJoinForm $userJoinForm)
    {
        $this->name = $userJoinForm->name;
        $this->email = $userJoinForm->email;
        $this->setPassword($userJoinForm->password);
        $this->status=1;
    }

    public function setPassword(string $password):void
    {
        $this->passhash = $password;
    }
}