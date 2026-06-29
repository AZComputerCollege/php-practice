<?php
trait LoggerTrait
{
    protected $logFile = 'app.log';

    public function setLogFile($file)
    {
        $this->logFile = $file;
    }

    public function log($message)
    {
        $date = date('Y-m-d H:i:s');
        $formattedMessage = "[{$date}] " . $message . PHP_EOL;

        $file = fopen($this->logFile, 'a');

        if (!$file) {
            throw new Exception("Unable to open log file.");
        }

        fwrite($file, $formattedMessage);
        fclose($file);
    }
}
