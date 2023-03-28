<?php
include('connection.php');
class DatabaseOperator extends connect
{



    public $columns = "";
    public $values = "";

    public $column = "";
    public $value = "";

    public function __construct()
    {
        parent::__construct();
    }


    public function insert($data, $user,)
    {


        foreach ($data as $this->column => $this->value) {
            if ($this->column == 'submit') {
                continue;
            }

            $this->columns .= ($this->columns == "") ? "" : ", ";
            $this->columns .= $this->column;

            $this->values .= ($this->values == "") ? "" : ", ";
            $this->values .= "'" . $this->value . "'";

            //echo $this->values;

        }

        $insert = ("INSERT into $user ($this->columns) values ($this->values)");
        echo $insert;
        $insert1 = $this->connection->query($insert);
    }

    public function selectalldata($user)
    {
        $select = "SELECT borrow_details.id, user.name, user.mobile, user.address, user.email, book_details.BookName, book_details.author, borrow_details.borrowerId, borrow_details.bookId, borrow_details.IssueDate, borrow_details.returnBy, borrow_details.securityAmount FROM borrow_details INNER JOIN user ON borrow_details.borrowerId = user.id INNER JOIN book_details ON borrow_details.bookId = book_details.bookid;";
        $select1 = $this->connection->query($select);
        return $select1;
    }

    public function selectById($user, $id)
    {
        $selectid = "SELECT * FROM $user where id=$id";
        $sel1 = $this->connection->query($selectid);
        return mysqli_fetch_array($sel1);
    }

    //insert function for bookdetails.
    public function insertbookdetails($data, $book_details,)
    {


        foreach ($data as $this->column => $this->value) {
            if ($this->column == 'submit') {
                continue;
            }

            $this->columns .= ($this->columns == "") ? "" : ", ";
            $this->columns .= $this->column;

            $this->values .= ($this->values == "") ? "" : ", ";
            $this->values .= "'" . $this->value . "'";
        }

        $insert = ("INSERT into $book_details ($this->columns) values ($this->values)");
        echo $insert;
        $insert1 = $this->connection->query($insert);
    }
    public function selectalldata1($book_details)
    {
        $select = "SELECT * FROM $book_details";
        $select1 = $this->connection->query($select);
        return $select1;
    }

    public function selectbookdata($book_details)
    {
        $select = "SELECT * FROM $book_details";
        $select1 = $this->connection->query($select);
        return $select1;
    }

    public function selectById1($book_details, $bookid)
    {
        $selectid = "SELECT * FROM $book_details where bookid=$bookid";
        $sel1 = $this->connection->query($selectid);
        return mysqli_fetch_array($sel1);
    }


    //insert for borrowdetails.


    public function insertborrowdetails($data, $borrow_details,)
    {


        foreach ($data as $this->column => $this->value) {
            if ($this->column == 'submit') {
                continue;
            }

            $this->columns .= ($this->columns == "") ? "" : ", ";
            $this->columns .= $this->column;

            $this->values .= ($this->values == "") ? "" : ", ";
            $this->values .= "'" . $this->value . "'";
        }

        $insert = ("INSERT into $borrow_details ($this->columns) values ($this->values)");
        echo $insert;
        $insert1 = $this->connection->query($insert);
    }

    public function selectalldata2($borrow_details)
    {
        $select = "SELECT * FROM $borrow_details";
        $select1 = $this->connection->query($select);
        return $select1;
    }

    public function selectById2($user, $id)
    {
        $selectid = "SELECT * FROM $user where id=$id";
        $sel1 = $this->connection->query($selectid);
        return mysqli_fetch_array($sel1);
    }


    // update fr 1st
    public function update($data, $user, $id)
    {
        foreach ($data as $this->column => $this->value) {
            $update = ("UPDATE $user SET $this->column = '$this->value' WHERE id= '$id'");
            $this->connection->query($update);
        }
        return true;
    }

    // function for update book table
    public function updatebookdata($data, $book_details, $bookid)
    {
        foreach ($data as $this->column => $this->value) {
            $updatebookdata = ("UPDATE $book_details SET $this->column = '$this->value' WHERE bookid= '$bookid'");
            $this->connection->query($updatebookdata);
        }
        return true;
    }

    // function for update user details
    public function updateuserdetails($data, $user, $id)
    {
        foreach ($data as $this->column => $this->value) {
            $updateuserdetails = ("UPDATE $user SET $this->column = '$this->value' WHERE id= '$id'");
            $this->connection->query($updateuserdetails);
        }
        return true;
    }


    // function for update borrow details

    public function updateborrowdata($data, $borrow_details, $id)
    {
        foreach ($data as $this->column => $this->value) {
            $updateborrowdata = ("UPDATE $borrow_details SET $this->column = '$this->value' WHERE id= '$id'");
            $this->connection->query($updateborrowdata);
        }
        return true;
    }

    public function selectById3($borrow_details, $id)
    {
        $selectid = "SELECT * FROM $borrow_details where id=$id";
        $sel1 = $this->connection->query($selectid);
        return mysqli_fetch_array($sel1);
    }


    function deletedata($borrow_details, $id)
    {
        $delete = ("DELETE FROM $borrow_details WHERE id=$id");
        echo json_encode($delete);
        $this->connection->query($delete);
        return true;
    }

    function deletebookdata($book_details, $bookid)
    {
        $delete = ("DELETE FROM $book_details WHERE bookid=$bookid");
        echo json_encode($delete);
        $this->connection->query($delete);
        return true;
    }
    function deleteborrowerdata($user, $id)
    {
        $delete = ("DELETE FROM $user WHERE id=$id");
        echo json_encode($delete);
        $this->connection->query($delete);
        return true;
    }
    function deleteborrowdata($borrow_details, $id)
    {
        $delete = ("DELETE FROM $borrow_details WHERE id=$id");
        echo json_encode($delete);
        $this->connection->query($delete);
        return true;
    }
}
