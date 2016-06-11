<?php
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">
    <?php //$form = ActiveForm::beginField();
 echo 'hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii';
    $client = \elasticsearch\elasticsearch\src\Elasticsearch\ClientBuilder::create()->build();
    print_r($client);die();
    ?>