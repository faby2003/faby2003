<?php
$connection=mysqli_connect("localhost","root","","watch_store");
if($connection)
{
    echo "database connected";
    $name=$_POST['name'];
    $number=$_POST['MobileNo'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $password=$_POST['password'];
    $insert="INSERT INTO `users`(`Name`, `Number`, `Email`, `Address`, `Password`) VALUES ('$name','$number','$email','$address','$password')";
    $insertlog="INSERT INTO `login`(`password`, `usertype`, `email`) VALUES ('$password','1','$email')";
    $sql=mysqli_query($connection,$insert);
    $sqll=mysqli_query($connection,$insertlog);
    if($sql && $sqll)
    {
        echo "values inserted";
        header('Location: login.html');
    }
    else{
        echo "values not inserted";
} 
}
else 
{
    echo "not connected";
}
?>