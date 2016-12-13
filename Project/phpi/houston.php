<?php
class houston{
  public $name="benny";
      function name()
      {

        echo $this->name;
}


}
echo "hello";
$conn= new houston();

$conn->name();
?>
