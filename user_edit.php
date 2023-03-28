<?php

include_once("DatabaseOperator.php");

$id = $_GET['id'];
$DatabaseOperator = new DatabaseOperator();
$editdata = $DatabaseOperator->selectbyid2('user', $id);

if (isset($_POST['submit'])) {

    $bookid = $_GET['id'];
    $data = array(

        "id" => $id,
        "name" => $_POST['name'],
        "mobile" => $_POST['mobile'],
        "address" => $_POST['address'],
        "email" => $_POST['email']

    );

    $DatabaseOperator->updateuserdetails($data, 'user', $id);


    if ($data) {
        echo 'insert successfully';
        header('location:user_table.php');
    } else {
        echo 'try again';
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
    <title>Borrower Details</title>
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
            <h3>Edit User Details</h3>
            <hr>

        </div>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">


                <div class="row">
                    <div class="col">
                        <label class="form-label">Name:</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $editdata['name']; ?>" required>

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label">Mobile no:</label>
                        <input type="text" class="form-control" name="mobile" value="<?php echo $editdata['mobile']; ?>" required>

                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label class="form-label">Address:</label>
                        <input type="text" class="form-control" name="address" value="<?php echo $editdata['address']; ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label">Email:</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $editdata['email']; ?>" required><br>
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>