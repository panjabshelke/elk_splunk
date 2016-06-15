<?php

namespace app\modules\elastic\controllers;

use yii;
use yii\web\Controller;
use app\modules\Elastic\models\Logs;
use yii\elasticsearch;
use index0h\log;
use index0h\log\base\EmergencyTrait;
use index0h\log\base\TargetTrait;
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
        echo '<pre>';
      $model = new Logs();  
      $dataprovider = $model->search('1');
      
      
$params = array();

//$params = json_encode($dataprovider);
//        print_r($dataprovider);
$params['id'] = 3;
foreach ($dataprovider as $key => $val) {
   $params['body']  = $val;
}
 

$params['index'] = 'pokemon';
$params['type']  = 'pokemon_trainer';


//$result = $this->connection()->create($params);

$result = $this->connection()->index($params);

print_r($params);
//    return $this->render('index',[
//        'dataProvider' => $dataprovider,
//    ]);
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

public function actionSearch(){
   $data = new log\LogstashTarget();
//    $model = new Logs();  
//      $dataprovider = $model->search('1');
   
//      $messages = "warnning";
//      $final = 1;
//   $result = $data->collect($messages, $final);
      print_r($data);
      die();
   //$data->collect($messages, $final);
   
   
        //return $this->render('say');
}

}
