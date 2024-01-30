<?php 

require_once "./includes/autoloadClasses.php";

$loggers = [
	new Logger\FileLogger('./log.txt'),
	new DatabaseLogger()
];

foreach ($loggers as $logger) {
	$logger->log('Log message');
}