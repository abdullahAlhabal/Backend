<?php

echo "WE ARE HERE NOW \n\n\n";
require_once __DIR__ . "/../../includes/autoloadInterfaces.php";

class FileLogger implements Logger_interface{
	private $handle;

	private $logFile;

	public function __construct($filename, $mode = 'a')
	{
		$this->logFile = $filename;
		// open log file for append
		$this->handle = fopen($filename, $mode)
				or die('Could not open the log file');
	}

	public function log($message)
	{
		$message = date('F j, Y, g:i a') . ': ' . $message . "\n";
		fwrite($this->handle, $message);
	}

	public function __destruct()
	{
		if ($this->handle) {
			fclose($this->handle);
		}
	}
}