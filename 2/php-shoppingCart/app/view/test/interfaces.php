<?php
error_reporting(1);
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

// ------------------------------------------------------------
echo '<br><br>--------------------Shapes<br><br>';

interface Shape {

    public function area();
}

class Square implements Shape {

    private $a;

    public function __construct($a) {
        $this->a = $a;
    }

    public function area() {
        return $this->a * $this->a;
    }

}

class Rectangle implements Shape {

    private $a;
    private $b;

    public function __construct($a, $b) {
        $this->a = $a;
        $this->b = $b;
    }

    public function area() {
        return ($this->a * $this->b);
    }

}

$s1 = new Square(2);
$s2 = new Square(3);
$s3 = new Rectangle(2, 2);
$s4 = new Rectangle(3, 2);

$shapes = [$s1, $s2, $s3, $s4];

foreach ($shapes as $shape) {
    var_dump($shape->area());
}

echo '<br><br>--------------------Liskov (L in SOLID): a sub class (that extends or implements) 
 when substituted or removed should not break the behaviour of parent class or interface.<br><br>';

class Thing implements Shape {

    private $a;

    public function __construct($a) {
        $this->a = $a;
    }

    public function area() {
        if ($this->a > 3) {

            // uncomment to see liskov being broken
            // throw new Exception();
        }
        return $this->a;
    }

}

$s5 = new Thing(6);
$shapes[] = $s5;

foreach ($shapes as $shape) {
    var_dump($shape->area());
}

echo '<br><br>--------------------Role interface<br><br>';

interface Role {

    public function create();
}

class UUser implements Role{

    private $role;

    public function __construct($loggedId) {

        
        switch($loggedId){
          case 1:
            $this->role = new Musician();
            return;
          case 2:
            $this->role = new Band();
            return;
        }
         
    }

    public function create() {
        return $this->role->create();
    }

}

class Musician extends UUser implements Role{
  
    public function create() {
        echo 'create musician<br>';
    }
}

class Band extends UUser implements Role{
    
    public function create() {
        echo 'create band<br>';
    }
}

$user1 = new UUser(1);
$user2 = new UUser(2);

$user1->create();
$user2->create();

echo '<br><br>--------------------Interface Segregation<br><br>';

interface Manageable{
    public function beManaged();
}

interface Workable{
    public function work();
}

interface Sleepable{
    public function sleep();
}

class Human implements Workable, Sleepable, Manageable{

    public function beManaged(){
        $this->work();
        $this->sleep();
    }

    public function work(){
        echo 'human working<br>';
    }

     public function sleep(){
        echo 'human sleeping<br>';
    }
}

class Android implements Workable, Manageable{

    public function beManaged(){
        $this->work();
    }

    public function work(){
        echo 'android sleeping<br>';
    }
}

class Captain {

    public function manage(Manageable $worker){
        $worker->beManaged();
    }
}

$human = new Human();
$android = new Android();

$cap = new Captain();
$cap->manage($human);
$cap->manage($android);

echo '<br><br>--------------------Static<br><br>';

class Player{

    public static   $name;
    public static   $age    = 0;
    public          $goals;

    
    public function __construct($name){
        static::$name       = $name;
        //static::$age        = 0;
        $this->goals        = 0;
    }

    public function toString(){
        return '<br>' . static::$name . ', ' . static::$age . ', ' . $this->goals;
    }

    public function incAge(){
        static::$age++;
    }

    public function setTotalGoals(...$goals){
        $this->goals = array_sum($goals);
    }
}

echo '<br>'.Player::$age;

$ronaldo = new Player('ronaldo');
$ronaldo->setTotalGoals(1,2,3,4);
$ronaldo->incAge();
$ronaldo->incAge();
$ronaldo->incAge();

echo '<br>'.Player::$age;

$messi = new Player('messi');
$messi->setTotalGoals(1,2);
$messi->incAge();

echo '<br>'.Player::$age;

