<?php
namespace  app\models;
use yii\base\Model;

class UserJoinForm extends Model
{
   public $name;
   public $email;
   public $password;
   public $password2;

    public function rules()
    {
        return [
             [
                 ['name', 'email', 'password', 'password2'],
                 'required'
             ],
            ['name','string','min'=>3, 'max'=> 30],
            ['email', 'email'],
            ['password','string','min'=>4],
            ['password2', 'compare', 'compareAttribute' => 'password' ],
            ['email','errorIfEmailUsed']
        ];
    }

    public function setUserRecord($userRecord)
    {
        $this->name = $userRecord->name;
        $this->email = $userRecord->email;
        $this->password = $this->password2 = "qwas";
    }

    public function errorIfEmailUsed()
    {
        if ( UserRecord::existsEmail($this->email)> 0)
        {
            $this->addError('email', 'This e-mail already exists');
        }

    }
}
