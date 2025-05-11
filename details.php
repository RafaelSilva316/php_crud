<?php
    include('conn.php');
    $id = $_GET['q'];
    $query = "SELECT id, name, phone, email FROM `contacts` WHERE id = '$id'";
    $run_query = mysqli_query($conn, $query);
    // print_r($run_query);
    $contact = mysqli_fetch_object($run_query);
    // print_r($contact);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
</head>
<body>
    <h2>Contact Details</h2>
    <hr>
    <a href="index.php">Back</a>
    <fieldset>
        <legend>Contact</legend>
        <table cellspacing="3" cellpadding="3" width="100%">
            <tr>
                <th>#ID</th>
                <td><?= $contact->id; ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?= $contact->name; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= $contact->email; ?></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><?= $contact->phone; ?></td>
            </tr>
            <tr colspan="2" align="center">
                <td>
                    <a href="delete.php?q=<?= $contact->id; ?>" onclick="return confirm('are you sure')"><button>Delete</button></a>
                </td>
            </tr>
        </table>
    </fieldset>
</body>
</html>