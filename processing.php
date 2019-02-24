<?php 
// 1. Empty fields

// 2. Existent username
// Username: test123

// 3. Password error
// Password is less than 6 characters

// 4. Other dump file that is not JSON 
// echo 'not json';

$data = array();
$data['username'] = '';
if(isset($_POST['username'])) {
    $data['username'] = trim($_POST['username']);
}
$data['password'] = '';
if(isset($_POST['password'])) {
    $data['password'] = $_POST['password'];
}

$mandatory_fields = array("username","password");
$valid = true;
$result['result']['errors'] = array();
$result['result']['success'] = array();

// Check is email already exists
if(isset($data['username']) AND $data['username'] == 'test123'){
        http_response_code(403);
        array_push($result['result']['errors'],array("path" => array("username"),"message" => "Username is already taken"));
        $valid=false;
}

if(isset($data['password']) AND strlen($data['password']) <= 6){
    http_response_code(403);
    array_push($result['result']['errors'],array("path" => array("password"),"message" => "Your password must contain at least 6 characters"));
    $valid=false;
}

foreach ($mandatory_fields as $field) {
    if (!isset($data[$field]) or $data[$field]=='') {
        http_response_code(403);
        array_push($result['result']['errors'],array("path" => array($field),"message" => "This field is mandatory"));
        $valid=false;
    }
}
if($valid) {
    array_push($result['result']['success'],array("message" => "User Registered"));
    http_response_code(200);
}
echo json_encode($result['result']);

?>