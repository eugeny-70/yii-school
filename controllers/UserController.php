<?php


namespace app\controllers;
use app\models\UserIdentity;
use app\models\UserRecord;
use Yii;
use yii\web\Controller;

class UserController extends Controller
{
    public function actionJoin()
    {
        //$userRecord = new UserRecord();
        //$userRecord->setTestuser();
        //$userRecord->save();
        return $this->render('join');
    }
    public function actionLogin()
    {
        $uid = UserIdentity::findIdentity(1);
        Yii::$app->user->login($uid);
        return $this->render('login');
    }
}