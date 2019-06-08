<?php

class Post{
	private $conn;
	private $table='movieinfo';

	//post properties
	public $id;
	public $name;
	public $genre;
	public $ratings;
	

	//constructor with db
	public function __construct($db){
		$this->conn=$db;
	}

	//get posts
	public function read(){
		$query='SELECT * FROM movieinfo' ;


		 //prepare statement
		 $stmt=$this->conn->prepare($query);
		 $stmt->execute();
		 return $stmt;
	}







	//get single post
// 	public function read_single(){
// 			$query='SELECT c.name as category_name, p.id, p.category_id, p.title, p.body, p.author, p.created_at from '.$this->table .' p
// 			LEFT JOIN categories c ON p.category_id=c.id
// 			WHERE p.id= ?
// 			LIMIT 0,1
// 		 ';

// 		 $stmt=$this->conn->prepare($query);

// 		 //Bind id, the ?
// 		 $stmt->bindParam(1, $this->id);
// 		 $stmt->execute();
// 		 $row=$stmt->fetch(PDO::FETCH_ASSOC);

// 		 //set properties
// 		 $this->title=$row['title'];
// 		 $this->body=$row['body'];
// 		 $this->author=$row['author'];
// 		 $this->category_id=$row['category_id'];
// 		 $this->category_name=$row['category_name'];
// 	}

// 	//create post

	public function create(){
		//create query
		$query= 'INSERT INTO movieinfo 
		SET
		 name= :name,
		genre= :genre,
		ratings= :ratings';


		//preapre statement

		$stmt=$this->conn->prepare($query);

		//clean data
		$this->name=htmlspecialchars(strip_tags($this->name));
		$this->genre=htmlspecialchars(strip_tags($this->genre));
		$this->ratings=htmlspecialchars(strip_tags($this->ratings));
		// $this->category_id=htmlspecialchars(strip_tags($this->category_id));

		//bind data
		$stmt->bindParam(':name', $this->name);
		$stmt->bindParam(':genre', $this->genre);
		$stmt->bindParam(':ratings',$this->ratings);
		// $stmt->bindParam(':category_id', $this->category_id);

		if($stmt->execute()){
			return true;
		}

		//printf("Error: %s.\n", $stmt->error);
		 return false;
	}



	public function update(){
		//create query
		$query= 'UPDATE movieinfo 
		SET
		name= :name,
		genre= :genre,
		ratings= :ratings
		
		Where id= :id';


		//preapre statement

		$stmt=$this->conn->prepare($query);

		//clean data
		$this->name=htmlspecialchars(strip_tags($this->name));
		$this->genre=htmlspecialchars(strip_tags($this->genre));
		$this->ratings=htmlspecialchars(strip_tags($this->ratings));
		// $this->category_id=htmlspecialchars(strip_tags($this->category_id));
		$this->id=htmlspecialchars(strip_tags($this->id));


		//bind data
		$stmt->bindParam(':name', $this->name);
		$stmt->bindParam(':genre', $this->genre);
		$stmt->bindParam(':ratings',$this->ratings);
		// $stmt->bindParam(':category_id', $this->category_id);
		$stmt->bindParam(':id',$this->id);


		if($stmt->execute()){
			return true;
		}

		//printf("Error: %s.\n", $stmt->error);
		 return false;
	}



	public function delete(){
		$query='DELETE FROM movieinfo WHERE id= :id';

		$stmt=$this->conn->prepare($query);

		
		$this->id=htmlspecialchars(strip_tags($this->id));


		//bind data
		$stmt->bindParam(':id', $this->id);

		if($stmt->execute()){
			return true;
		}

		//printf("Error: %s.\n", $stmt->error);
		 return false;
	}


 }
 ?>


