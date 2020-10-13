<?php
class TableView
{
  private $table = "";
  private $data;

  function __construct($data)
  {
    $this->data = $data;
  }

  public function GetTable($admin)
  {
    $i = 1;
    while ($row = mysqli_fetch_array($this->data))
    {
      $this->table .= "<tr>";

      $this->addCell($row['id']);
      $this->addCell($row['username']);
      $this->addCell($row['email']);

      $status = $this->parseStatus($row);

      if ($admin)
      {
        $this->addEditableCell($row['text'], $row['id']);
        $this->addCell($status);

        $button = $this->Button($row['id']);
        $this->addCell($button);
      }
      else
      {
        $this->addCell($row['text']);
        $this->addCell($status);
      }

      $this->table .= "</tr>";
      $i++;
    }

    return $this->table;
  }

  function Button($id)
  {
    return "<form method='post'><button name='check' value='$id' class='btn btn-primary'>✓</button></form>";
  }

  function parseStatus($row)
  {
    $status = "";
    if ($row['completed'])
    {
      $status .= " выполнено";
    }

    if ($row['edited'])
    {
      $status .= " отредактировано администратором";
    }

    return $status;
  }

  function addEditableCell($field, $id)
  {
    $code = "<textarea class='form-control' value ='$id' name='task' rows='3'>" . $field . "</textarea>";
    $this->addCell($code);
  }

  function addCell($field)
  {
    $this->table .= "<td>" . $field . "</td>";
  }
}
?>
