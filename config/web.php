<?php
   return [
    'id' => 'video',
     'basePath' => realpath(__DIR__ . '/../'),
       'bootstrap' => ['debug'],
       'components' => [
           'urlManager' =>[
               'enablePrettyUrl' => true,
               'showScriptName' => false
           ],
           'request' => [
               'cookieValidationKey' => '151565+652'
           ],
           'db' => require  __DIR__ . '/db.php'
       ],
       'modules' => [
           'debug' => [
              'class' => 'yii\debug\Module',
               'allowedIPs' => ['127.0.0.1', '::1']
               ]

       ]
   ];