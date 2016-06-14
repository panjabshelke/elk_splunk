<?php

namespace app\modules\elastic\controllers;

use yii\web\Controller;
use app\modules\Elastic\models\Logs;
use yii\elasticsearch;
use \Elasticsearch\Transport;
//require 'app/vendor/autoload.php';
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
 
$params = array();
//$params['id'] = 1;
$params['body']  = array(
  'name' => '',
  'age' => 11,
  'badges' => 8 
);

$params['index'] = 'pokemon';
$params['type']  = 'pokemon_trainer';

$result = $this->connection()->create($params);
        echo '<pre>';
        print_r($result);
       // return $this->render('index');
      //  echo $this->actionSay();
    }
    public function actionSay()
{
        
        $params = [
    'index' => 'pokemon',
    'type' => 'pokemon_trainer',
    'body' => [
        'query' => [
            'match_all' => []
        ]
    ],
    'client' => [
        'curl' => [
            CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1
        ]
    ]
];
//$selct->search($params);
        
      $client =   $this->connection()->search($params);
 echo '<pre>';
        print_r($client);
   // return $this->render('say');
}

public function connection() {
    return \Elasticsearch\ClientBuilder::create()->build();
}

public function actionsSearch(){
    $model = new \yii\debug\models\search\Log();
    echo '<pre>';
        print_r($model);
        exit;
        //return $this->render('say');
}
}
