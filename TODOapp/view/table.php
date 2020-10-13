<?php

function GetAdminHeadTable()
{
  return GetDefaultHeadTable() . "<th><div class='btn'>Отметить</div></th>";
}

function GetDefaultHeadTable()
{
  return "
          <th><div class='btn'>#</div></th>
          <th><button class='btn btn-link' name='sort' value='username'>Имя пользователя</button></th>
          <th><button class='btn btn-link' name='sort' value='email'>e-mail</button></th>
          <th><div class='btn'>Текст задачи</div></th>
          <th><button class='btn btn-link' name='sort' value='completed'>Статус</button></th>
          ";
}
 ?>
