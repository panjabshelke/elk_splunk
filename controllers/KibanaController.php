<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class KibanaController extends Controller {

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
        $a = 0;
        $b = 1;
        $odd_no = 9;
        $value = $odd_no / 2;

        for ($i = 1; $i <= $odd_no; $i++) :
            if ($i % 2 != 0):
                $temp[] = $i;
            endif;
        endfor;
        foreach ($temp as $key => $val):
            $temp_var = $odd_no - $val;
            $left = $right = $temp_var / 2;
            $left_str = 1;
            for ($i = 1; $i <= $odd_no; $i++) :
                if ($left == 0 && $left_str != 0) {
                    if($val <= 0) {
                        echo "O ";
                    } else {
                        echo "X ";
                        $val--;
                    }
                    $left_str = 1;
                } else {
                    if($left!=0){
                        echo "O ";
                        $left--;
                    }
                }
            endfor;
            echo "<br/>";
        endforeach;

        echo "<br/><br/>End herer<br/><br/>";
        die;
//        $curl = new \Elasticsearch\Common\Exceptions\Curl();
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        $cmd_output = exec('curl -XPUT "localhost:9200/customer?pretty"');
        print_r($cmd_output);

        for ($i = 1; $i <= 7; $i++) :
            for ($j = 1; $j <= 7; $j++) :
                echo "X";
            endfor;
            echo "<br/>";
        endfor;

        echo "heelo";
        die();
        return $this->render('index');
    }

    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    public function actionAbout() {
        return $this->render('about');
    }

    public function actionElastic() {
        return $this->render('elastic');
    }

}
