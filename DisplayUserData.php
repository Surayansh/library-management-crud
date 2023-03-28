<?php
include('DatabaseOperator.php');
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $DatabaseOperator = new DatabaseOperator();
    $DatabaseOperator->deletedata("borrow_details", $id);
    header('location:DisplayUserData.php');
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


        <div class="navbar-brand">
            <img src="images/logo.png" alt="Logo" width="100" height="50" class="d-inline-block align-text-top">
            Central Library
            <div class="viewbutton">
                <a href="borrowDetails.php" class="btn btn-primary" role="button" data-bs-toggle="button">Add New</a>
            </div>

        </div>

        <nav>
            <a href="user_details.php">New User</a>
            <a href="bookDetails.php">New Book</a>
            <a href="DisplayUserData.php">View Data</a>
        </nav>

    </header>


    <div class="container">
        <div class="text-center mb-4">
            <h3>Details of Issued Books.</h3>
            <hr>

        </div>
        <table class="table table-hover text-center">
            <thead class="table-dark">
                <tr>

                    <th scope="col">Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Author</th>
                    <th scope="col">Issue Date</th>
                    <th scope="col">Return By</th>
                    <th scope="col">Security Amount</th>

                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $DatabaseOperator = new DatabaseOperator();
                $result = $DatabaseOperator->selectalldata("user");
                while ($data = mysqli_fetch_array($result)) {
                    //echo json_encode($data);
                ?>


                    <tr>

                        <td><?php echo $data['name'] ?> </td>
                        <td><?php echo $data['mobile'] ?></td>
                        <td><?php echo $data['address'] ?></td>
                        <td><?php echo $data['email'] ?></td>
                        <td><?php echo $data['BookName'] ?></td>
                        <td><?php echo $data['author'] ?></td>
                        <td><?php echo $data['IssueDate'] ?></td>
                        <td><?php echo $data['returnBy'] ?></td>
                        <td><?php echo $data['securityAmount'] ?></td>





                        <td>
                            <a class="btn btn-primary" href="borrow_details_edit.php?id=<?php echo $data['id'] ?>&bookId=<?php echo $data['bookId'] ?>&borrowerId=<?php echo $data['borrowerId'] ?>" role="button">Edit</a>
                            <a class="btn btn-primary" href="DisplayUserData.php?id=<?php echo $data['id'] ?>" role="button">Delete</a>

                        </td>
                    </tr>

                <?php } ?>

            </tbody>

        </table>
    </div>





</body>

</html>