<?
use \yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<div class="panel panel-info">
    <div class="panel-heading">
        <h1>Log in</h1>
    </div>
    <div class="panel-body">
        <? $form=ActiveForm::begin(['id'=>'user-login-form']); ?>
        <?= $form->field($userLoginForm, 'email'); ?>
        <?= $form->field($userLoginForm, 'password')->passwordInput(); ?>
        <?= $form->field($userLoginForm, 'remember')->checkbox(); ?>
        <?= Html::submitButton('Enter',
            ['class' => 'btn btn-primary']) ?>

        <? ActiveForm::end(); ?>
    </div>
</div>