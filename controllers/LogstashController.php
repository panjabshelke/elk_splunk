<?php

namespace app\controllers;

//namespace app\vendor\index0h;
//namespace app\vendor\index0h\log;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
//use app\models\LoginForm;
//use app\models\ContactForm;
//use app\vendor\index0h\yii2-log\src;
use app\vendor\index0h\log\base\LogstashFileTarget;

class LogstashController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex() {
        $log = new \index0h\log\LogstashFileTarget();
        $log->formatMessage(array(array(array('name' => "adssadasdasd"))));
        print_r($log->messages);
        die;
    }

}
