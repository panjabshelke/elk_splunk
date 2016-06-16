<?php

namespace app\modules\elastic\controllers;

use yii;
use yii\web\Controller;
use app\modules\Elastic\models\Logs;
use yii\elasticsearch;
use Monolog\Logger;
use Monolog\Handler\LogglyHandler;
use Monolog\Formatter\LogglyFormatter;
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
  
}
public function actionMonolog(){    
echo'<pre>';
    $logEnv = getenv('1');
    $level = empty($logLevel)?$logEnv:\Monolog\Logger::WARNING;
    $log = new Logger('service_log');
    
    $strHandler = new \Monolog\Handler\StreamHandler('C:\Users\SACHIN\Desktop\ELK\runtime.log', \Monolog\Logger::DEBUG);
    //$strHandler = new \Monolog\Handler\SyslogHandler('C:\Users\SACHIN\Desktop\ELK\syslog.txt', \Monolog\Logger::DEBUG);
    //$fcHandler = new \Monolog\Handler\FingersCrossedHandler($strHandler,$level);
    
    $formatter = new \Monolog\Formatter\LogstashFormatter("my Logstash",'application');
    $strHandler->setFormatter($formatter);
    $data = $log->pushHandler($strHandler);
    
    
   //$id = $_SERVER['X_VARNISH'];
   
  // print_r($_SERVER);exit;
//   $tag = new \Monolog\Processor\TagProcessor(['requested id'=>$id]);
//   $data =  $log->pushProcessor($tag);
   $report = $log->debug("logging!");

print_r($strHandler);exit;

}

}
