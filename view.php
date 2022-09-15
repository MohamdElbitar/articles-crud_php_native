<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - MYSQL - CRUD</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</head>

<body>
    <section>
        <h1 style="text-align: center;margin: 50px 0;">View Article</h1>
        <div class="container">
            <?php 
                require_once "conn.php";
                $sql_query = "SELECT * FROM articles WHERE id = ".$_GET["id"];
                if ($result = $conn ->query($sql_query)) {
                    while ($row = $result -> fetch_assoc()) { 
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $body = $row['body'];
                        $image = $row['image'];

                       
                    }
                }
                        // $creation_date = $row['creation-date'];
            ?>
    <div class="container">
	<div class="row">
		<table class="table">
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Description</th>
				<th>Body</th>
				<th>Image</th>
				
			</tr>
			
			<tr>
				<td><?php echo $id; ?></td>
				<td><?php echo $title; ?></td>
				<td><?php echo $description; ?></td>
				<td><?php echo $body; ?></td>
				<td><img src="./images/<?php echo $image; ?> " width="50" height="50" ></td>
			</tr>
			
			
			
		
			
		</table>
    </div>
        </div>
    </section>
</body>

</html>