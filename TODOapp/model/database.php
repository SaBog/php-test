<?php

 class DataBase
 {
   private $host = "localhost";
   private $databaseName = "todolist";

   protected $connection;

   private function isConnected()
   {
     return !mysqli_connect_errno();
   }

   protected function connect($user, $password)
   {
     $this->connection = new mysqli($this->host, $user,
       $password, $this->databaseName);

     return $this->isConnected();
   }

   protected function query($query)
   {
     $this->sign();
     $result = $this->connection->query($query);
     return $result;
   }

 }

 ?>
