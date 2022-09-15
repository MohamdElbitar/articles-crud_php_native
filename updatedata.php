<!DOCTYPE html>
<html lang="en">
<?php
    require_once "conn.php";
    if(isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["body"])  && isset($_POST["image"])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $body = $_POST['body'];
        $image = $_POST['image'];
        $sql = "UPDATE articles SET `title`= '$title', `description`= '$description', `image`= '$image' , `body`= '$body' WHERE id= ".$_GET["id"];
        if (mysqli_query($conn, $sql)) {
            header("location: index.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }


    
 
?>
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
        <h1 style="text-align: center;margin: 50px 0;">Update Data</h1>
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

                        // $creation_date = $row['creation-date'];
            ?>
                            <form action="updatedata.php?id=<?php echo $id; ?>" method="post">
                                <div class="row">
                                        <div class="form-group col-lg-4">
                                        <label for="">Title </label>
                        <input type="text" name="title" id="name" class="form-control" value="<?php echo $title ?>" required>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="">Description</label>
                                            <input type="text" name="description" id="auther" class="form-control" value="<?php echo $description ?>" required>
                                         </div>
                                         <div class="form-group col-lg-3">
                                            <label for="">Body</label>
                                            <input type="text" name="body" id="auther" class="form-control" value="<?php echo $body ?>" required>
                                         </div>
                                         <div class="form-group col-lg-3">
                        <label for="">Image</label>
                        <input  type="text"  name="image" id="image" class="form-control"  value="<?php echo $image ?>" required>
                    </div>
                                        <div class="form-group col-lg-2" style="display: grid;align-items:  flex-end;">
                                            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Update">
                                        </div>
                                </div>
                            </form>
            <?php 
                    }
                }
            ?>
        </div>
    </section>
</body>

</html>