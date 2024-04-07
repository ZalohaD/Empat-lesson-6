<?php

// Variable declaration
$color = 'red';
$anotherColor = 'green';

echo $color . "</br>";
echo $anotherColor . "</br>";

// Numbers
$test = 1234; // decimal number
$test2 = 0123; // octal number (equivalent to 83 decimal)
$test3 = 0o123; // octal number (as of PHP 8.1.0)
$test4 = 0x1A; // hexadecimal number (equivalent to 26 decimal)
$test5 = 0b11111111; // binary number (equivalent to 255 decimal)
$test6 = 1_234_567; // decimal number (as of PHP 7.4.0)

// Strings
$str = 'PHP';
echo $str[0]; // P
echo $str[1]; // H
echo $str[2]; // P
echo "</br>";

$var = 'Name';
$$var = 'Denys';
var_dump($var);
echo "</br>";
var_dump($$var);
echo "</br>";

$text = 'hello word';

for ($i = 0; $i < strlen($text); $i++):
    echo $text[$i];
endfor;

$uppercase = strtoupper($text); // Перетворить $text у верхній регістр
$lowercase = strtolower($text); // Перетворить $text у нижній регістр
$trimmed = trim("  Hello  "); // Видалить зайві пробіли по краях рядка

?>

<form method="GET">
    <input type="text" name="name" id="name" placeholder="Enter name">
    <button type="submit">Submit</button>
</form>

<?php
$greetings = 'hello';
if(isset($_GET['name'])) {
    echo $greetings . ' ' . $_GET['name'];
}
echo "</br>";


if(isset($_GET['surname'])){
    echo $_GET['surname'] . "</br>";
}

//Arrays
$cars = array("Volvo", "BMW", "Toyota");

foreach ($cars as $car){
    echo $car . "</br>";
}

echo "</br>";
$arr1 = [
    'Sasha' => 23,
    'Egor' => 17,
    'Denys' => 22
];

echo "Egor is " . $arr1['Egor'] . " years old.";
echo "</br>";
//explode implode

$str = "Hello world. From Empat with Love.";

print_r (explode(".",$str));
echo "</br>";

$a = 10;
$b = 2;
if ($a % $b == 0){
    echo 'true';
} else {
    echo 'false';
}



$arr = array('Hello', 'world.', 'From Empat','with Love.');
echo "</br>";
print_r (implode(" ", $arr));

//Приведення типів

$foo = '123';
$bar = (int)$foo;
echo "</br>";
var_dump($foo);
echo "</br>";
var_dump($bar);
echo "</br>";

// Singleton

class DB {
    private PDO $pdo;
    private $database;
    protected static $_instance = null;


    private function __construct(){}
    private function  __clone(){}
    private function  __wakeup(){}
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function connect( $host, $user, $password, $database, $port = 3306 ) {
        $this->database = $database;
        $this->pdo = new PDO('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $database, $user, $password);
    }

    public function get_database() {
        return $this->database;
    }

    public function query( $query ) {
        $sql = $this->pdo->prepare( $query );
        $result = $sql->execute();

        $operator = strtok($query, " ");
        if ( !in_array( $operator, array( "SELECT", "DESCRIBE", "SHOW" ) ) ) {
            return $result;
        } else {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }
}

function DB() {
    return DB::instance();
}

function SQL( $query ) {
    return DB()->query( $query );
}





