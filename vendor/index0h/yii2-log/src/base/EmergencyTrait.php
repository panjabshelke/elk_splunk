<?php
<<<<<<< HEAD

=======
>>>>>>> e40366a3a519f01859103f84ae64139014817b95
/**
 * @link      https://github.com/index0h/yii2-log
 * @copyright Copyright (c) 2014 Roman Levishchenko <index.0h@gmail.com>
 * @license   https://raw.github.com/index0h/yii2-log/master/LICENSE
 */

namespace index0h\log\base;

use yii\helpers\ArrayHelper;

/**
 * Current class needs to write logs on external service exception.
 *
 * @property array messages The messages that are retrieved from the logger so far by this log target.
 *
 * @author Roman Levishchenko <index.0h@gmail.com>
 */
<<<<<<< HEAD
trait EmergencyTrait {

=======
trait EmergencyTrait
{
>>>>>>> e40366a3a519f01859103f84ae64139014817b95
    /** @var string Alias of log file. */
    public $emergencyLogFile = '@runtime/logs/logService.log';

    /**
     * @param array $data Additional information to log messages from target.
     */
<<<<<<< HEAD
    public function emergencyExport($data) {
=======
    public function emergencyExport($data)
    {
>>>>>>> e40366a3a519f01859103f84ae64139014817b95
        $this->emergencyPrepareMessages($data);
        $text = implode("\n", array_map([$this, 'formatMessage'], $this->messages)) . "\n";

        file_put_contents(\Yii::getAlias($this->emergencyLogFile), $text, FILE_APPEND);
    }

    /**
     * @param array $data Additional information to log messages from target.
     */
<<<<<<< HEAD
    protected function emergencyPrepareMessages($data) {
=======
    protected function emergencyPrepareMessages($data)
    {
>>>>>>> e40366a3a519f01859103f84ae64139014817b95
        foreach ($this->messages as &$message) {
            $message[0] = ArrayHelper::merge($message[0], ['emergency' => $data]);
        }
    }
<<<<<<< HEAD

}
=======
}
>>>>>>> e40366a3a519f01859103f84ae64139014817b95
