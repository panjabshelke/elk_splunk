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

/**
 * @author Roman Levishchenko <index.0h@gmail.com>
 */
<<<<<<< HEAD
class LogstashTarget extends \yii\log\Target {

    use TargetTrait;

use EmergencyTrait;

    /** @var string Connection configuration to Logstash. */
    public $dsn = 'tcp://localhost:3306';
=======
class LogstashTarget extends \yii\log\Target
{
    use TargetTrait;
    use EmergencyTrait;

    /** @var string Connection configuration to Logstash. */
    public $dsn = 'tcp://localhost:3333';
>>>>>>> e40366a3a519f01859103f84ae64139014817b95

    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    public function export() {
        try {
            ini_set("default_socket_timeout", 606000);
=======
    public function export()
    {
        try {
>>>>>>> e40366a3a519f01859103f84ae64139014817b95
            $socket = stream_socket_client($this->dsn, $errorNumber, $error, 30);

            foreach ($this->messages as &$message) {
                fwrite($socket, $this->formatMessage($message) . "\r\n");
<<<<<<< HEAD
                sleep(100000);
=======
>>>>>>> e40366a3a519f01859103f84ae64139014817b95
            }

            fclose($socket);
        } catch (\Exception $error) {
            $this->emergencyExport(
<<<<<<< HEAD
                    [
                        'dsn' => $this->dsn,
                        'error' => $error->getMessage(),
                        'errorNumber' => $error->getCode(),
                        'trace' => $error->getTraceAsString()
                    ]
            );
        }
    }

=======
                [
                    'dsn' => $this->dsn,
                    'error' => $error->getMessage(),
                    'errorNumber' => $error->getCode(),
                    'trace' => $error->getTraceAsString()
                ]
            );
        }
    }
>>>>>>> e40366a3a519f01859103f84ae64139014817b95
}
