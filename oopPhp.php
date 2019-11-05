<?php
class Person {
  public $age;
  function speak() {
    echo "Hi!";
  }
}
$p1 = new Person(); //instantiate an object
$p1->age = 23; // assignment 
echo $p1->age; // 23
$p1->speak(); // Hi!
?>
