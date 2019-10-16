<?php


namespace app\controllers;
use app\models\UserIdentity;
use app\models\UserJoinForm;
use app\models\UserRecord;
use app\models\UserLoginForm;
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
                    $userRecord = new UserRecord();
                    $userRecord->setUserJoinForm($userJoinForm);
                    $userRecord->save();
                    return $this->redirect('/user/login');
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
        $userLoginForm = new UserLoginForm();
        if(Yii::$app->request->isPost)
        {
            if ($userLoginForm->load(Yii::$app->request->post()))
            {
                if($userLoginForm->validate())
                {
                   $userLoginForm->login();
                    return $this->redirect('/');
                }
            }
        }
        return $this->render('login', compact('userLoginForm'));
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect('/');
    }
}