<?php session_start(); ?>
<?php
if(!$_SESSION['first_name']){

header("location:login.php");

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARTICLES</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <!-- <li class="nav-item active">
          <a class="nav-link" href="index.php">Home </a>
        </li> -->
        <li class="nav-item ">
          <a class="nav-link" href="index.php">Articles</a>
        </li>

        <li class="nav-item">
        <a class="nav-link" >
           <?php 
            if(isset($_SESSION['valid']))
            {
                include ("conn.php");
                $result =mysqli_query($conn,"SELECT * FROM users");
            }
                ?>
       <?php echo $_SESSION['first_name']?>
       </a>
        </li>
      
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
        
      </ul>
    
    </div>
  </nav>
    <section>
        <h1 style="text-align: center;margin: 50px 0;">ARTICLES</h1>
        <div class="container">
            <form action="adddata.php" method="post">
               <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="">Title </label>
                        <input type="text" name="title" id="name" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="">Description</label>
                        <input type="text" name="description" id="description" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="">Body</label>
                        <input type="text" name="body" id="body" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="">Upload Articles Image</label>
                        <input  type="file"  name="image" id="image" class="form-control" required>
                    </div>
                    <!-- <div class="form-group col-lg-3">
                        <label for="">Date</label>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div> -->
                    <div class="form-group col-lg-2" style="display: grid;align-items:  flex-end;">
                        <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Add New Articles">
                    </div>
               </div>
            </form>
        </div>
    </section>
    <section style="margin: 50px 0;">
        <div class="container">
            <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Auther</th>
                    <th scope="col">Image</th>
                    <th scope="col">Creation Date</th>
                    <th scope="col">View</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        require_once "conn.php";
                        $sql_query = "SELECT * FROM articles";
                        if ($result = $conn ->query($sql_query)) {
                            while ($row = $result -> fetch_assoc()) { 
                                $id = $row['id'];
                                $title = $row['title'];
                              // $auther = $row['auther'];
                                $image = $row['image'];
                                $creation_date = $row['creation-date'];
                    ?>
                    
                    <tr class="trow">
                        <td><?php echo $id; ?></td>
                        <td><?php echo $title; ?></td>
                        <td>  <?php 
           
           $stmt = $conn->prepare("SELECT  first_name FROM users where id=".$row["user_id"]);
           $stmt->execute();
           $stmt->bind_result($fname);
           $rs= $stmt->fetch ();
           $stmt->close();
                         ?>
                        <?php echo ($fname);?></td>
                        <td><img src="./images/<?php echo $image; ?> " width="50" height="50"></td>
                        <td><?php echo $creation_date; ?></td>
                        <?php 
                        if($row['user_id'] == $_SESSION['uid']){
                        ?>
                        
                        <td><a href="view.php?id=<?php echo $id; ?>" class="btn btn-success">view</a></td>
                        <td><a href="updatedata.php?id=<?php echo $id; ?>" class="btn btn-primary">Edit</a></td>
                        <td><a href="deletedata.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a></td>
                        <?php 
                        }
                        ?>
                        </tr>

                    <?php
                            } 
                        } 
                    ?>
                </tbody>
              </table>
        </div>
    </section>
</body>

</html>