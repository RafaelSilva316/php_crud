<?php
    include('conn.php');
    $id = $_GET['q'];
    $query = "SELECT id, name, email, phone FROM `contacts` WHERE id = '$id'";
    $run_query = mysqli_query($conn, $query);
    $contact = mysqli_fetch_object($run_query);
    print_r($contact);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <fieldset>
        <legend>Edit Contact</legend>
        <form method="POST" action="update.php?q=<?= $contact->id; ?>">
            <table width="50%">
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" value="<?= $contact->name ?>" required></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" value="<?= $contact->email ?>" required></td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td><input type="text" name="phone" value="<?= $contact->phone ?>" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" name='submit'>Update Contact</button>
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
</html>
