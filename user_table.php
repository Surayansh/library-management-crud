<?php
include('DatabaseOperator.php');

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $DatabaseOperator = new DatabaseOperator();
    $DatabaseOperator->deleteborrowerdata("user", $_GET['id']);
    header('location:user_table.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <div class="">
            <a class="navbar-brand">
                <img src="images/logo.png" alt="Logo" width="100" height="50" class="d-inline-block align-text-top">
            </a>
        </div>
        <nav>
            <a href="bookDetails.php">New Book</a>
            <a href="borrowDetails.php">New Borrrow</a>
            <a href="DisplayUserData.php">View All Data</a>
        </nav>
    </header>


    <div class="container">
        <div class="text-center mb-4">
            <h3>User Details</h3>
            <hr>

        </div>
        <a href="user_details.php" class="btn btn-dark">Add New</a>
        <table class="table table-hover text-center">
            <thead class="table-dark">
                <tr>

                    <th scope="col">Borrower Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile No.</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>


                </tr>
            </thead>
            <tbody>
                <?php
                $DatabaseOperator = new DatabaseOperator();
                $result = $DatabaseOperator->selectalldata2("user");
                while ($data = mysqli_fetch_array($result)) {
                    //echo json_encode($data);
                ?>


                    <tr>

                        <td><?php echo $data['id'] ?> </td>
                        <td><?php echo $data['name'] ?></td>
                        <td><?php echo $data['mobile'] ?></td>
                        <td><?php echo $data['address'] ?></td>
                        <td><?php echo $data['email'] ?></td>

                        <td>
                            <a class="btn btn-primary" href="user_edit.php?id=<?php echo $data['id'] ?>" role="button">Edit</a>
                            <a class="btn btn-primary" href="user_table.php?id=<?php echo $data['id'] ?>" role="button">Delete</a>

                        </td>
                    </tr>
                <?php } ?>

            </tbody>

        </table>
    </div>




</body>

</html>