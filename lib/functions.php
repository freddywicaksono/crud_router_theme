<?php
require_once __DIR__ . "/../vendor/autoload.php"; 
use Bramus\Router\Router;

function getJSON($jsonResponse){
    $data = json_decode($jsonResponse);

    // Check if the JSON decoding was successful
    if ($data !== null) {
        // Access the values
        $success = $data->success; // true
        $message = $data->message; // "Update successful"

        // Now you can use $success and $message in your PHP code
        if ($success) {
            $val = true;
        } else {
            $val = false;
        }
    } else {
        // JSON parsing failed
        $val = "error";
    }
    return $val;
}

function base_url(){
    $base = $_ENV["BASE_URL"];
    return $base;
}

function ShowCheckBoxValue($val){
    if($val===0){
        $result = "Tidak";
    } else {
        $result = "Ya";
    }
    return $result;
}

function setTheme(){
    $theme = $_ENV["THEME"];
    return $theme;
}

function getHeader($theme_name){
    include("themes/".$theme_name."/header.php"); 
    include("themes/".$theme_name."/leftmenu.php"); 
    include("themes/".$theme_name."/topnav.php");
    include("themes/".$theme_name."/upper_block.php");
}

function getFooter($theme_name, $extra){
    include("themes/".$theme_name."/lower_block.php"); 
    echo $extra;
    include("themes/".$theme_name."/footer.php"); 
    
    echo '</body>
    </html>';
}
function getURL(){
    // Get the protocol (http:// or https://)
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';

// Get the host (e.g., localhost)
$host = $_SERVER['HTTP_HOST'];

// Get the request URI (e.g., /oop/matakuliah/edit/5)
$request_uri = $_SERVER['REQUEST_URI'];

// Combine the parts to create the full URL
$full_url = $protocol . $host . $request_uri;
return $full_url;
}
function getFilename(){
    $host = $_SERVER["HTTP_HOST"];
    $uri = $_SERVER["REQUEST_URI"];
    $url = "http://".$host.$uri;
    $parsed_url = parse_url($url);

    // Get the path from the parsed URL
    $path = $parsed_url["path"];

    // Use pathinfo to extract the filename
    $file_info = pathinfo($path);

    // Get the filename
    $filename = $file_info["basename"];

    return $file_info;
}
function getSegment($url,$index){
    
    // Parse the URL
    $parsed_url = parse_url($url);

    // Get the path from the parsed URL
    $path = $parsed_url['path'];

    // Split the path into segments using the slash as a delimiter
    $segments = explode('/', trim($path, '/'));

    // Get the first segment (in this case, "/page")
    $page_segment = isset($segments[$index]) ? $segments[$index] : null;
    return $page_segment;
}
function setupRouter($Routes) {
    $router = new Router();

    $baseUrl = "http://localhost/rumahsakit"; // Set your base URL here

    foreach ($Routes as $baseRoute) {
        $router->get($baseRoute, function () use ($baseRoute, $baseUrl) {
            header("Location: $baseUrl/$baseRoute/list");
        });
    
        $router->get($baseRoute."/list", function () use ($baseRoute) {
            include "views/$baseRoute/list.php";
        });
    
        $router->get("$baseRoute/add", function () use ($baseRoute) {
            include "views/$baseRoute/add.php";
        });
    
        $router->post("$baseRoute/insert", function () use ($baseRoute) {
            // Get data from the form or request
            include("views/$baseRoute/insert.php");
        });
    
        $router->get("$baseRoute/edit/(\d+)", function ($id) use ($baseRoute) {
            // Fetch Mahasiswa data based on the ID from the database
            include("views/$baseRoute/edit.php");
        });
    
        $router->post("$baseRoute/update", function () use ($baseRoute) {
            // Get data from the form or request
            include("views/$baseRoute/update.php");
        });
    
        $router->get("$baseRoute/delete/(\d+)", function ($id) use ($baseRoute) {
            // Fetch Mahasiswa data based on the ID from the database
            include("views/$baseRoute/delete.php");
        });
    
        $router->post("$baseRoute/remove", function () use ($baseRoute) {
            // Get data from the form or request
            include("views/$baseRoute/remove.php");
        });
    }

    return $router;
}

function getThemeDirectory() {
    $url = getURL();
    $segment = getSegment($url, 2);

    if ($segment == "add" || $segment == "list" || $segment == "insert" || $segment == "update" || $segment == "remove" ) {
        $theme_dir = "../themes";
    } else {
        $theme_dir = "../../themes";
    }

    return $theme_dir;
}

function html_message_success($content){
    echo '
    <div class="card radius-10 border shadow-none">
        <div class="card-body">
            <h5 class="card-title">Output Message</h5>
            <div class="my-3 border-top"></div>
            <div class="alert alert-dismissible fade show py-2 bg-success">
                <div class="d-flex align-items-center">
                    <div class="fs-3 text-white"><ion-icon name="checkmark-circle-sharp"></ion-icon></div>
                    <div class="ms-3">
                        <div class="text-white">'.$content.'</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
';
}

function html_message_error($content){
    echo '
    <div class="card radius-10 border shadow-none">
        <div class="card-body">
            <h5 class="card-title">Output Message</h5>
            <div class="my-3 border-top"></div>
            <div class="alert alert-dismissible fade show py-2 bg-danger">
                <div class="d-flex align-items-center">
                  <div class="fs-3 text-white"><ion-icon name="close-circle-sharp"></ion-icon>
                  </div>
                  <div class="ms-3">
                    <div class="text-white">'.$content.'</div>
                  </div>
                </div>
              </div>
        </div>
    </div>
';
}
?>
