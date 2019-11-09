<?php

use Medoo\Medoo;
use Dotenv\Dotenv;
use Carbon\Carbon;

class Database
{
    /** @var Medoo */
    private $database = null;

    public function __construct()
    {
        $dotenv = Dotenv::create(__DIR__);
        $dotenv->load();

        $this->database =  new Medoo([
        'database_type' => 'mysql',
        'database_name' => $_ENV['DB_NAME'],
        'server' => $_ENV['DB_HOST'],
        'username' => $_ENV['DB_USERNAME'],
        'password' => $_ENV['DB_PASSWORD']
    ]);
    }

    /** @return string */
    public function getTask($date)
    {
        return $this->database->get('tasks', [
            'id',
            'task',
            'num_completed'
        ], [
            'date' => $date
        ]);
    }

    public function markAsDone()
    {
        $task = $this->getTask(Carbon::now()->toDateString());        
        if (!$task) {
            return;
        }

        $increment = $task["num_completed"] + 1;
        $this->database->update('tasks', ['num_completed' => $increment], ['id' => $task['id']]);
    }
}
