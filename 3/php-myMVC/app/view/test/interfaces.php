<?php

/**
* An example of duck typing in PHP
*/

interface CanFly {
  public function fly();
}

interface CanSwim {
  public function swim();
}

class Bird {
  public function info() {
    echo "I am a {$this->name}\n";
    echo "I am an bird<br>";
  }
}

/**
* some implementations of birds
*/
class Dove extends Bird implements CanFly {
  var $name = "Dove";
  public function fly() {
    echo "I fly<br>";
  } 
}

class Penguin extends Bird implements CanSwim {
  var $name = "Penguin";
  public function swim() {
    echo "I swim<br>";
  } 
}

class Duck extends Bird implements CanFly, CanSwim {
  var $name = "Duck";
  public function fly() {
    echo "I fly<br>";
  }
  public function swim() {
    echo "I swim<br>";
  }
}

/**
* a simple function to describe a bird
*/
function describe($bird) {
  if ($bird instanceof Bird) {
    $bird->info();
    if ($bird instanceof CanFly) {
      $bird->fly();
    }
    if ($bird instanceof CanSwim) {
      $bird->swim();
    }
  } else {
    die("This is not a bird. I cannot describe it.");
  }
}

// describe these birds please
describe(new Penguin);
echo "---\n";

describe(new Dove);
echo "---\n";

describe(new Duck);