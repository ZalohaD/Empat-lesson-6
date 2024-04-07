<?php
//Http requests


// Обробка GET запиту
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['name'])) {
        $name = $_GET['name'];
        echo "</br>";
        echo "Hello, $name!";
    } else {
        echo "</br>";
        echo "Hello, Guest!";
    }
}
?>

<form action="" method="post">
    <input type="text" name="message">
    <button type="submit">Submit message</button>
</form>

<?php // Обробка POST запиту
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['message'])) {
        $message = $_POST['message'];
        echo "</br>";
        echo "Your message: $message";
    } else {
        echo "</br>";
        echo "No message received!";
    }
}

// Використання масивів $_GET, $_POST, $_REQUEST
if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'logout') {
    // Якщо є параметр action зі значенням "logout", то розлогінитись
    session_start();
    session_destroy();
    setcookie('user', '', time() - 3600); // Видалити cookie
    echo "</br>";
    echo "You have been logged out!";
}

// Надбудова (клас-wrapper) над $_GET, $_POST
class Request
{
    public static function get($key)
    {
        return $_GET[$key] ?? null;
    }

    public static function post($key)
    {
        return $_POST[$key] ?? null;
    }

    public static function request($key)
    {
        return $_REQUEST[$key] ?? null;
    }
}

$name = Request::get('name');
$message = Request::post('message');
$action = Request::request('action');


// Робота з cookies
if (!isset($_COOKIE['user'])) {
    setcookie('user', 'John Doe', time() + 3600); // Встановлення cookie на 1 годину
    echo "</br>";
    echo "Cookie 'user' set!";
} else {
    echo "</br>";
    echo "Hello, " . $_COOKIE['user'] . "!";
}

// Робота з сесіями
session_start();
if (!isset($_SESSION['views'])) {
    $_SESSION['views'] = 1;
} else {
    $_SESSION['views']++;
}
echo "</br>";
echo "Pageviews: " . $_SESSION['views'];
