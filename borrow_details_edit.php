<?php

include_once("DatabaseOperator.php");

$id = $_GET['id'];
$DatabaseOperator = new DatabaseOperator();
$editdata = $DatabaseOperator->selectById3('borrow_details', $id);

if (isset($_POST['submit'])) {

    $bookid = $_GET['id'];
    $data = array(

        "id" => $id,
        // "borrowerId" => $borrowerId,
        // "bookId" => $bookId,
        "IssueDate" => $_POST['IssueDate'],
        "returnBy" => $_POST['returnBy'],
        "securityAmount" => $_POST['securityAmount'],
    );

    $DatabaseOperator->updateborrowdata($data, 'borrow_details', $id);


    if ($data) {
        echo 'insert successfully';
        header('location:DisplayUserData.php');
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

    <title>Borrow Details</title>
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
            <a href="bookDetails.php">New Book</a>
            <a href="DisplayUserData.php">View Data</a>
        </nav>
    </header>


    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit Borrow Details</h3>
            <hr>

        </div>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">

                <!----user_details--->
                <div class="drop">

                    <div class="dropdown">
                        <select name="bookid" id="bookid">
                            <?php
                            $DatabaseOperator = new DatabaseOperator();

                            $result = $DatabaseOperator->selectalldata1("book_details");
                            while ($data = mysqli_fetch_array($result)) {
                                echo json_encode($data);
                            ?>
                                <?php
                                $selected = "";
                                if ($data['bookid'] == $_GET['bookId']) {
                                    $selected = "selected";
                                }
                                ?>
                                <option <?php echo $selected ?> value="<?php echo $data['bookid'] ?>"><?php echo $data['BookName'] ?></option>
                            <?php } ?>

                        </select>
                    </div>

                    <div class="dropdown">
                        <select name="borrowerId" id="borrowerId">
                            <?php
                            $DatabaseOperator = new DatabaseOperator();
                            $result = $DatabaseOperator->selectalldata1("user");
                            while ($data = mysqli_fetch_array($result)) {
                                echo json_encode($data);

                            ?> <?php
                                $selected = "";
                                if ($data['borrowerId'] == $_GET['borrowerId']) {
                                    $selected = "selected";
                                }
                                ?>
                                <option <?php echo $selected ?> value="<?php echo $data['id'] ?>"><?php echo $data['name'];
                                                                                                    echo "-";
                                                                                                    echo $data['email'] ?></option>
                            <?php } ?>

                        </select>
                    </div>
                </div>



                <div class="row">
                    <div class="col">
                        <label class="form-label">Issue Date</label>
                        <input type="date" class="form-control" name="IssueDate" value="<?php echo $editdata['IssueDate']; ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label class="form-label">Return By:</label>
                        <input type="date" class="form-control" name="returnBy" value="<?php echo $editdata['returnBy']; ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label class="form-label">Security Amount:</label>
                        <input type="text" class="form-control" name="securityAmount" value="<?php echo $editdata['securityAmount']; ?>" required><br>
                    </div>
                </div>


                <div>
                    <button type="submit" class="btn btn-success" name="submit">Submit</button>

                </div>
</body>

</html>