<?php
<<<<<<< HEAD

=======
>>>>>>> e40366a3a519f01859103f84ae64139014817b95
/**
 * @link      https://github.com/index0h/yii2-log
 * @copyright Copyright (c) 2014 Roman Levishchenko <index.0h@gmail.com>
 * @license   https://raw.github.com/index0h/yii2-log/master/LICENSE
 */

namespace index0h\log;

use index0h\log\base\EmergencyTrait;
use index0h\log\base\TargetTrait;
use yii\log\Target;

/**
 * @author Roman Levishchenko <index.0h@gmail.com>
 */
<<<<<<< HEAD
class ElasticsearchTarget extends Target {

    use TargetTrait;

use EmergencyTrait;
=======
class ElasticsearchTarget extends Target
{
    use TargetTrait;
    use EmergencyTrait;
>>>>>>> e40366a3a519f01859103f84ae64139014817b95

    /** @var string Elasticsearch index name. */
    public $index = 'yii';

    /** @var string Elasticsearch type name. */
    public $type = 'log';

    /** @var string Yii Elasticsearch component name. */
    public $componentName = 'elasticsearch';

    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    public function export() {
=======
    public function export()
    {
>>>>>>> e40366a3a519f01859103f84ae64139014817b95
        try {
            $messages = array_map([$this, 'formatMessage'], $this->messages);
            foreach ($messages as &$message) {
                \Yii::$app->{$this->componentName}->post([$this->index, $this->type], [], $message);
            }
        } catch (\Exception $error) {
            $this->emergencyExport(
<<<<<<< HEAD
                    [
                        'index' => $this->index,
                        'type' => $this->type,
                        'error' => $error->getMessage(),
                        'errorNumber' => $error->getCode(),
                        'trace' => $error->getTraceAsString()
                    ]
            );
        }
    }

=======
                [
                    'index' => $this->index,
                    'type' => $this->type,
                    'error' => $error->getMessage(),
                    'errorNumber' => $error->getCode(),
                    'trace' => $error->getTraceAsString()
                ]
            );
        }
    }
>>>>>>> e40366a3a519f01859103f84ae64139014817b95
}
