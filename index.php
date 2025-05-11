<?php
    include('conn.php');

    if (isset($_POST['submit'])){
        echo 'post submit';
        echo isset($_POST['submit']);
        echo $_POST['submit'];
        echo $_POST['name'];

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        // echo $name . ' ' . $email . ' ' . $phone;
        $query = "INSERT INTO `contacts` (name, email, phone)
	        VALUES ('$name', '$email', '$phone');";

        // $run_query = mysqli_query($conn, $query);
        // print_r($run_query);
        header('Location: '. 'index.php');
        if(mysqli_query($conn, $query)){
            echo '<strong style="color:green">Contact has been added</strong>';
        }
    }

    //showing data

    $query = "SELECT * FROM `contacts`;";
    $run_query = mysqli_query($conn, $query);
    // print_r($run->num_rows);
    // print_r(mysqli_fetch_object($run));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
</head>
<body>
    <h1>Contacts</h1>

    <?php 

    if($run_query->num_rows == 0){
        // echo $run_query->num_rows;
        echo '<h3 style="color: orange";>No data to show</h3>';
    }

    ?>

    <fieldset>
        <legend>Add New Contact</legend>
        <form method="POST" action="index.php">
            <table width="50%">
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" required></td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td><input type="text" name="phone" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" name='submit'>Create Contact</button>
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>

    <fieldset>
        <legend>Contact List</legend>
        <table cellspacing="5">
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>

            <?php while ($contact = mysqli_fetch_object($run_query)):?>
            <tr>
                <td> <?php echo $contact->id ?></td>
                <td><?php echo $contact->name ?></td>
                <td><?php echo $contact->email ?></td>
                <td><?php echo $contact->phone ?></td>
                <td>
                    <a href="delete.php?q=<?= $contact->id ?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a>

                    <a href="details.php?q=<?= $contact->id; ?>">Details</a>

                    <a href="edit.php?q=<?= $contact->id; ?>">Update</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </fieldset>
</body>
</html>