<?php


namespace app\controllers;
use app\models\UserIdentity;
use app\models\UserJoinForm;
use app\models\UserRecord;
use Yii;
use yii\web\Controller;

class UserController extends Controller
{
    public function actionJoin()
    {
        $userJoinForm = new UserJoinForm();
        if(Yii::$app->request->isPost)
        {
            if ($userJoinForm->load(Yii::$app->request->post()))
            {
                if($userJoinForm->validate())
                {
                    $userJoinForm->name = ".ok";
                }
            }
        }
        else
        {
            $userRecord = new UserRecord();
            $userRecord->setTestUser();
            $userJoinForm->setUserRecord($userRecord);
        }
        return $this->render('join', compact('userJoinForm') );
    }


    public function actionLogin()
    {
        //$uid = UserIdentity::findIdentity(1);
        //Yii::$app->user->login($uid);
        return $this->render('login');
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect('/');
    }
}