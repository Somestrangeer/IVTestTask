<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<title>Third</title>
		<style type="text/css">
			ul{
				width: 650px;
			}
			label{
				width: 650px;
				margin-bottom: 20px;
				margin-top: 20px;

			}
			button{
				margin-bottom: 20px;
				margin-top: 20px;
			}
			textarea{
				resize: none;
			}
			.title{
				position: absolute;
				z-index: 1;
				top: 0px;
				height: 70px;
				width: 350px;
				text-align: center;
				background-color: white;
			}
			.comments{
				position: relative;
				top: 65px;
				overflow-y: scroll;
				overflow-x: unset;
				max-height: 300px;
				width: ;
			}
			.date{
				font-size: 12px;
			}
		</style>
	</head>
	<body>
		<div class="d-flex justify-content-center align-items-center">
			<div class="title">
				<h2>Comments</h2>
			</div>
			<div class="comments">
				<ul class="list-group mt-3">
            	<?php
            		//connect to the db
            		$connection = new mysqli("localhost", "root", "", "sys");

            		//check if there's any error
            		if ($connection->connect_error) {
                		die("Connection failed: " . $connection->connect_error);
            		}

            		//fetch comments from teh db
            		$sql = "SELECT * FROM comments ORDER BY id DESC";
            		$result = $connection->query($sql);

            		//if we have at least one comment
            		if ($result->num_rows > 0) {
                		while($row = $result->fetch_assoc()) {
                    		echo '<div class="list-group-item">' 
                    		. $row["comment"] . 
                    			'<div class="date">'
                    			. $row["created_at"] .
                    			'</div>'
                    		.'</div>';
                		}
            		} 
            		else {
                		echo '<li class="list-group-item">No comments yet.</li>';
            			}

            		$connection->close();
            		?>
        		</ul>
			</div>
		</div>
		<div class="containter mt-5 d-flex justify-content-center align-items-center">
			<form action="process.php" method="post" class="mt-3" id="commentForm">
				<div class="form_group">
					<label for="comment">Add your comment here:</label>
					<textarea class="form-control" id="comment" name="comment" form="commentForm" rows="3" autofocus required></textarea>
				</div>
				
				<button type="submit" class="btn btn-primary">Send</button>
			</form>
		</div>
	</body>
</html>