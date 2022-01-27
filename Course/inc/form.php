<?php
$fname = $_POST["firstName"];
$lname = $_POST["lastName"];
$email  = $_POST["email"];

$errors = [
    'FirstNameError' => '',
    'LastNameError' => '',
    'EmailError' => '',
];

if(isset($_POST['submit']))
{
    $lname = mysqli_real_escape_string($conn, $_POST["lastName"]) ;
    $fname = mysqli_real_escape_string($conn, $_POST["firstName"]) ;
    $email  = mysqli_real_escape_string($conn, $_POST["email"]) ;


    $sql="INSERT INTO userinfo(FirstName,LastName,Email) 
          VALUES ('$fname','$lname','$email')";
    
    if(empty($fname))
    {
        $errors['FirstNameError'] = "First name is empty"; 
        //echo "First name is empty";
    }
    if(empty($lname))
    {
        $errors['LastNameError'] = "Last name is empty";
        //echo "Last name is empty";
    }
    if(empty($email))
    {
        $errors['EmailError'] = "Email is empty";
        //echo "Email is empty";
    }
    elseif(! filter_var($email, FILTER_VALIDATE_EMAIL )){
        $errors['EmailError'] = "This is not an email";
        //echo "This is not an email";
    }
    else{
        if(mysqli_query($conn,$sql))
        {
            header("Location: test.php");
        }
        else {
            echo "Error:". mysqli_error($conn) ;
        }
    }
}
?>