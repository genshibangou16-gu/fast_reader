<?php

require_once('parts.php');

header('Content-Type: application/json');

// when posting multibyte strings, you must post URL-encoded values
print(parts(urldecode($_POST['inputText'])));