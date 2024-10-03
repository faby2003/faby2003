<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home - Watch Store</title>
    <link rel="stylesheet" href="adminhome.css">
    <link rel="stylesheet" href="viewproduct.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<header>
        <nav class="navbar">
            <div class="logo">
                <h1>WatchStore Admin</h1>
            </div>
            <ul class="nav-links">
                <li><a href="adminhome.html">Dashboard</a></li>
                <li><a href="home.html">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="main">
    <?php
        $con = mysqli_connect("localhost", "root", "", "watch_store");

        if (!$con) {
            die("DB not connected: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM `products`";
        $data = mysqli_query($con, $sql);

        if ($data) {
            if (mysqli_num_rows($data) > 0) {
                echo "<table border='1'>";
                echo "<tr>
                    <th>Model</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Product ID</th>
                    <th>Product Description</th>
                    <th>Actions</th>
                </tr>";

                while ($value = mysqli_fetch_assoc($data)) {
                    $id=$value['productid'];
                    $img=$value['image'] ;
                    echo "<tr>";
                    echo "<td>" . $value['model'] . "</td>";
                    echo "<td>" . $value['price'] . "</td>";
                    echo "<td>" . $value['quantity'] . "</td>";
                    echo "<td> <img style='height:200px; width:200px' src='./images/$img'</td>";
                    echo "<td>" . $value['productid'] . "</td>";
                    echo "<td>" . $value['pdiscription'] . "</td>";
                    echo "<td><form method='post'><button style='background:transperent;' value='{$id}' name='deluser' type='submit'>DELETE</button></form></td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "No users found.";
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }

    ?>
    </div>