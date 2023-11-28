<?

use controller\AuthController;

include_once("autoloader.php");

try {
    if (isset($_SERVER["REQUEST_METHOD"])) {
        if (!isset($_POST["username"])) {
            http_response_code(400);
            echo "Username in body is not set.";
            die();
        }
        if (!isset($_POST["password"])) {
            http_response_code(400);
            echo "Password in body is not set.";
            die();
        }
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        $authController = new AuthController();
        $authController->verify_password($username, $password);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo "serveur error " . $e->getMessage();
    die();
}