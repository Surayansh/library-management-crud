<?php

include_once("DatabaseOperator.php");

$DatabaseOperator = new DatabaseOperator();

if (isset($_POST['submit'])) {
    $data = $_POST;

    $DatabaseOperator->insertbookdetails($data, 'book_details');


    if ($data) {
        //echo 'insert successfully';
        header('location:book_table.php');
    } else {
        //echo 'try again';
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Book Details</title>
</head>

<body>
    <header>
        <div class="">
            <a class="navbar-brand">
                <img src="images/logo.png" alt="Logo" width="100" height="50" class="d-inline-block align-text-top">
            </a>
        </div>
        <nav>
            <a href="user_details.php">New User</a>
            <a href="borrowDetails.php">New Borrrow</a>
            <a href="DisplayUserData.php">View All Data</a>
        </nav>
    </header>


    <div class="container">
        <div class="text-center mb-4">
            <h3>Add Book Details</h3>
            <hr>

        </div>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">

                <!---Book_Details--->
                <div class="row">
                    <div class="col">
                        <label class="form-label">Book Name:</label>
                        <input type="text" class="form-control" name="BookName" required>

                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label class="form-label">Author:</label>
                        <input type="text" class="form-control" name="author" required><br>
                    </div>
                </div>
                <div class="redirect">
                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Submit</button>

                    </div>
                    <div>
                        <a href="book_table.php" class="btn btn-primary" role="button" data-bs-toggle="button">View existing books</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>