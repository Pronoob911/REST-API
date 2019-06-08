<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Post.php';


//instantiate database and connkect
$database=new Database();
$db=$database->connect();


//instantiate blog post object
$post=new Post($db);

$result=$post->read();

//get row count
$num=$result->rowCount();

//check if there are any posts
if($num>0){
	$posts_arr=array();
	$posts_arr['data']=array();

	while($row=$result->fetch(PDO::FETCH_ASSOC)){
		extract($row);

		$post_item=array(
			'id'=>$id,
			'name'=>$name,
			'genre'=>$genre,
			'ratings'=>$ratings,
			
		);

		//push to the data
		array_push($posts_arr['data'], $post_item);
	}

	echo json_encode($posts_arr);
}
else{
	echo json_encode(
		array('message' => 'No Posts found'));
}





?>