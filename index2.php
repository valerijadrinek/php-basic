<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Forms with php</title>
    <link rel="icon" type="image/png" href="./assets/favicon-32x32.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header -->
    <header>Welcome PHP OOP</header>
    <h3>
        <?php 
           class Fruits {
            // properties
            public $name;
            public $color;

            // Methods
            public function __construct($name, $color) {
                $this->name = $name;
                $this->color = $color;
            }

            public function __destruct() {
               echo "The fruit is {$this->name} and it's {$this->color}.<br> ";
            }

            public function intro() {
                echo "Hi! I'am a {$this->color} {$this->name}!<br>";
            }
        }


        //    Object Apple
           $apple = new Fruits('apple', 'red');
           
        //    Object Banana
           //$banana = new Fruits();
           //$banana->set_name('banana');
           //$banana->set_color('yellow');
           //var_dump($apple instanceof Fruits);
          

           class Strawberry extends Fruits {
            const LEAVING_MESSAGE = "<h4>Thank You for watching!</h4><br>";
            public function messageTwo() {
                echo self::LEAVING_MESSAGE;
            }
            public function message() {
                echo "<h4>Am I a fruit or a vegetable?</h4><br>";
            }
           }

           $strawberry = new Strawberry('strawberry', 'red');
           $strawberry->message();
           $strawberry->intro();
           $strawberry->messageTwo(); 
        ?>
    </h3>

    <?php 
    //    Abstarct classes-

    //Parent class
    abstract class Car {
        public $name;

        public function __construct($name) {
            $this->name = $name;
        }

        abstract public function intro() : string;
    }

    // Children classes
    class Audi extends Car {
        public function intro() : string {
            return "Choose German quality! I'm an $this->name!";
        }
    }

    class Volvo extends Car {
        public function intro() : string {
            return "Proud to be Swedish! I'm an $this->name!";
        }
    }

    class Citroen extends Car {
        public function intro() : string {
            return "French extravagance! I'm an $this->name!";
        }
    }

    //Creating objects from classes
    $audi = new Audi('Audi');
    $volvo = new Volvo('Volvo');
    $citroen = new Citroen('Citroen');
    

    echo "<p>{$audi->intro()}</p><br>";
    echo "<p>{$volvo->intro()}</p><br>";
    echo "<p>{$citroen->intro()}</p><br>";
   
    //Iterable function
    function printIterable(iterable $myIterable) {
        foreach($myIterable as $item) {
          echo "<p>$item</p><br>";
        }
      }

      //some array: printIterable(array);
      //Return iterable
      
function getIterable():iterable {
  return ["a", "b", "c"];
}

$myIterable = getIterable();
foreach($myIterable as $item) {
  echo $item;
}


      //Interfaces-use only methods not properties
      interface Animal {
        public function makeSound();
      }

      //Classes definition
      class Cat implements Animal {
        public function makeSound() {
            echo "<span>Meow </span>";
        }
      }

      class Dog implements Animal {
        public function makeSound() {
            echo "<span>Bark </span>";
        }
      }

      class Mouse implements Animal {
        public function makeSound() {
            echo "<span>Squek </span><br>";
        }
      }

      //Create a list of animals
      $cat = new Cat();
      $dog = new Dog();
      $mouse = new Mouse();
      $animals = array($cat, $dog, $mouse);

      foreach($animals as $item) {
        echo $item->makeSound();
      }

      //Traits-osobine- inheritance is going down to object made from classes than lean on traits-methods only

      trait message1 {
        public function msg1() {
            echo "<h3>OOP is fun!<h3>";
        }
      }

      trait message2 {
        public function msg2() {
            echo "<h3>OOP helps reducing code duplication! </h3>";
                }
      }

      class Welcome {
        use message1;
      }

      class Welcome2 {
        use message1, message2;
      }
      

      $obj1 = new Welcome();
      $obj1->msg1();

      $obj2 = new Welcome2();
      $obj2->msg1();
      $obj2->msg2();

      //STATIC METHODS
      class Greeting {
        public static function welcome() {
          echo "Hello World!";
        }
        public function __construct() {
            self::welcome();
        }
      }
      
      // Call static method
      greeting::welcome();
      new Greeting();


      class Domain {
        protected static function getWebsiteName() {
            return "W3School";
        }
      }

      class domainW3 extends domain {
        public $websiteName;

        public function __construct() {
            $this->websiteName = parent :: getWebsiteName();
        }
      }

      $domainW3 = new domainW3();
      echo "<br>{$domainW3->websiteName}<br>";

    ?>