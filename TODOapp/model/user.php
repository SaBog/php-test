<?php

/**
 *
 */
class User extends DataBase
{
  private $username;
  private $password;

  private $sortColumn = "id";
  public $desc = false;

  private $adminRoots = false;
  private $recordsOnPage = 3;

  function __construct($username, $password)
  {
    $this->username = $username;
    $this->password = $password;
  }

  public static function create()
  {
       $instance = new self("TODOlistUser", "");
       return $instance;
  }

  public function INSERT($query)
  {
    $sql = "INSERT INTO tasks (username, email, text) VALUES (" . $query . ")";
    $this->query($sql);
  }

  public function COMPLETE($id)
  {
    $sql = "UPDATE tasks SET completed = !completed where id = " . $id;
    $this->query($sql);
  }

  public function EDIT($text, $id)
  {
    $sql = "UPDATE tasks SET text = '$text', edited = TRUE where id = " . $id;
    $this->query($sql);
  }

  public function NEWORDER($column, $reverse)
  {
    $this->desc = $reverse;
    $this->sortColumn = $column;
  }

  public function SORT()
  {
    $desc = $this->desc ? " DESC " : " ";
    return " ORDER BY " . $this->sortColumn . $desc;
  }

  public function pageCount()
  {
    $sql = "SELECT COUNT(*) FROM tasks";
    return ceil(mysqli_fetch_array($this->query($sql))[0] / $this->recordsOnPage);
  }

  public function SELECT($pageNumber)
  {
    $sql = "SELECT * from tasks" . $this->SORT() . " LIMIT " . $pageNumber * $this->recordsOnPage . ", " . $this->recordsOnPage;
    return $this->query($sql);
  }

  public function sign()
  {
    $connection = $this->connect($this->username, $this->password);
    $this->checkAdminAccount($connection);

    return $connection;
  }

  public function checkAdminAccount($connection)
  {
    if ($connection && $this->username == "admin")
    {
      $this->adminRoots = true;
    }
  }

  public function isAdmin()
  {
    return $this->adminRoots;
  }


}


 ?>
