<?php

namespace app\modules\Elastic\models;

use yii;

/**
 * This is the model class for table "logs".
 *
 * @property integer $id
 * @property string $logs_title
 * @property string $description
 * @property string $date
 */
class Logs extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public $document;

    public static function tableName() {
        return 'logs';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['logs_title', 'description'], 'required'],
            [['date'], 'safe'],
            [['logs_title'], 'string', 'max' => 25],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'logs_title' => 'Logs Title',
            'description' => 'Description',
            'date' => 'Date',
        ];
    }

// public function behaviors()
//    {
//        return array(
//            'searchable' => array(
//                'class' => 'YiiElasticSearch\SearchableBehavior',
//            ),
//        );
//    }
    public function search($params) {
       $query = yii::$app->db->createCommand('select * from logs')->queryAll();
 return $query;
    }

}
