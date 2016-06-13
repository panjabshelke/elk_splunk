<?php

namespace app\modules\elastic\controllers;

use yii\web\Controller;
use app\modules\Elastic\models\Logs;

/**
 * Default controller for the `elastic` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
       // require 'vendor/autoload.php';

$client = new Elasticsearch\Client();
        
        print_r($client);
       // return $this->render('index');
      //  echo $this->actionSay();
    }
    public function actionSay()
{
    return $this->render('say');
}
}
