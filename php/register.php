<?php

$mongoClient = new MongoClient("mongodb://localhost:27017");


$database = $mongoClient->akash;
$collection = $database->list;

$name = $_POST['name'];
$email= $_POST['email'];
$mobile= $_POST['mob'];
$dob=$_POST['dob'];
$location= $_POST['loc'];
$nationality= $_POST['nationality'];
$password= $_POST['pas'];


$name = filter_var($name, FILTER_SANITIZE_STRING);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format");
}
$mobile = filter_var($mobile, FILTER_SANITIZE_NUMBER_INT); 
if (!preg_match("/^[0-9]{10}$/", $mobile)) {
    die("Invalid mobile number format");
}
$location=filter_var($location,FILTER_SANITIZE_STRING);
$nationality=filter_var($nationality,FILTER_SANITIZE_STRING);
$password=silter_var($password,FILTER_SANITIZE_STRING);


$document = array(
    "name" => $name,
    "email" => $email,
    "mobile" =>$mobile,
    "dob" => $dob,
    "location" => $location,
    "location" => $nationality,
    "password" => $password
);


$result = $collection->insertOne($document);

if ($result->getInsertedCount() > 0) {
    echo "Data inserted successfully";
} else {
    echo "Error inserting data";
}
?>
