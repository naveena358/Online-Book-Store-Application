<?php

function getCategoryList(){
  $db = getDBConnection();
  $array_list = array();
  $query = "SELECT * FROM book_category";
  $rs = $db->query($query);
  $ul  = "<ul>";
  if($rs->num_rows > 0)
  {
      while($row = $rs->fetch_array())
      {
        $ul .= '<li><a id="cat_anchor'.$row['category_id'].'" href="index.php?id='.$row['category_id'].'">'.$row['category_name'].'</a></li>';
      }
      $rs->close();
  }
  $ul  .= "</ul>";
  $db->close();

  return $ul;

}

function getBooksList($id){

  $db = getDBConnection();
  $array_list = array();
  if($id == -1){
    $query = "SELECT * FROM books";
  } else {
    $query = "SELECT * FROM books WHERE book_category=".$id;
  }

  $rs = $db->query($query);
  if($rs->num_rows > 0)
  {
      while($row = $rs->fetch_array())
      {
        $array_list[] = $row;
      }
      $rs->close();
  }
  $db->close();

  return $array_list;

}




?>
