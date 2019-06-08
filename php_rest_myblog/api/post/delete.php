<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Post.php';


//instantiate database and connect
$database=new Database();
$db=$database->connect();


//instantiate blog post object
$post=new Post($db);


//get the raw posted data
$data=json_decode(file_get_contents("php://input"));

//set id to update

$post->id =$data->id;

//delete post
if($post->delete()){
	echo json_encode(array('message'=> 'Post deleted'));
}
else{
	echo 123;
}


