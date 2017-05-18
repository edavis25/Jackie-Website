<?php

// Check if user is logged in with SESSION loggedin flag
function isLoggedIn() {
    $inSession = session_id();
    if (!empty($inSession)) {
        if (isset($_SESSION['loggedin'])) {
            return $_SESSION['loggedin'];
        }
    }
    return false;
}
 
// Ensure the user is logged in
function ensureLoggedIn() {
    if (!isLoggedIn()) {
        $_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
        redirectRelative('login'); // URL for logging in page
        exit();
    }
}

// Validate the presence of an element in the POST array and return bulleted error string
function validate_present($elements) {
    $errors = '';
    foreach ($elements as $element) {
        if (!isset($_POST[$element]) || empty($_POST[$element])) {
            $errors .= "&bull;  Missing $element<br />\n";
        }
    }
    return $errors;
}

// Dump an array in a pretty format...
function dumpArray($elements) {
    $result = "<ol>\n";
    foreach ($elements as $key => $value) {
        if (is_array($value)) {
            $result .= "<li>Key <b>$key</b> is an array
                containing:\n" . dumpArray($value) . "</li>";
        } else {
            $value = nl2br(htmlspecialchars($value));
            $result .= "<li>Key <b>$key</b> has value <b>$value</b></li>\n";
        }
    }
    return $result . "</ol>\n";
}

// Function to safely fetch a value from an array, supplying a default if no key is present
function safeGet($array, $key, $default=false) {
    if (isset($array[$key])) {
        $value = $array[$key];
        if (!is_array($value)) {
            $value = htmlspecialchars(trim($array[$key]));
        }
        if ($value) {
            return $value;
        }
    }
    return $default;
}

// Function to safely get a variable from an array by index, supplying a default if no key is present
function safeParam($arr, $index, $default=false) {
    if ($arr && isset($arr[$index])) {
        return htmlentities($arr[$index]);
    }
    return $default;
}

// Dump a variable in a nice debug <div>
function debug($something) {
    echo "<div class='debug'>\n";
    print_r($something);
    echo "\n</div>\n";
}

// Redirect to a different location
function redirect($url) {
    header("Location: $url");
    exit();
}

// Function for handling relative urls
function redirectRelative($url) {
    redirect(relativeURL($url));
}

// Create a relative URL string
function relativeUrl($url) {
    $requestURI = explode('/', $_SERVER['REQUEST_URI']);
    $scriptName = explode('/', $_SERVER['SCRIPT_NAME']);
    $dir = array();
    for ($i = 0; $i < sizeof($scriptName); $i++) {
        if ($requestURI[$i] == $scriptName[$i]) {
            $dir[] = $requestURI[$i];
        } else {
            break;
        }
    }
    return implode('/', $dir) . '/' . $url;
}

function __resolveRelativeUrls($matches) {
    return relativeUrl($matches[1]);
}

