
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    </head>


    <body style="background-image: url(img.jpg);">
    <div class="container">
    <a href="index.php"><button type="button" class="btn btn-primary btn-lg" >Add Data</button></a>
    </div>
    <div class="container">
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">FirstName</th>
                <th scope="col">LastName</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">DOB</th>
                <th scope="col">Gender</th>
                <th scope="col">Address</th>
                <th scope="col">Hobbies</th>
            </tr>
            <?php 
                include_once"config.php";
                $sql=mysqli_query($conn,"SELECT * FROM details");

                while($row=mysqli_fetch_assoc($sql)){
                    $unserializeHobby=unserialize($row['hobbies']);

           ?>

        </thead>
        <tbody>
            <tr>
                <td><?=$row["first_name"] ?></td>
                <td><?=$row["last_name"] ?></td>
                <td><?=$row["email"] ?></td>
                <td><?=$row["mobile_num"] ?></td>
                <td><?=$row["dob"] ?></td>
                <td><?=$row["gender"] ?></td>
                <td><?=$row["address"] ?></td>
                <td><?php 
                        foreach ($unserializeHobby as $key => $value){
                            echo $value.", ";
                        }
                    ?>
                </td>
            </tr>
            <?php 
                }
            ?>
           
        </tbody>
    </table>
    </div>
    </body>

</html>

