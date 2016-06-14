<?php

namespace app\modules\Elastic\models;

use Yii;

/**
 * This is the model class for table "logs".
 *
 * @property integer $id
 * @property string $logs_title
 * @property string $description
 * @property string $date
 */
class search_Logs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'logs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
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
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'logs_title' => 'Logs Title',
            'description' => 'Description',
            'date' => 'Date',
        ];
    }
}
