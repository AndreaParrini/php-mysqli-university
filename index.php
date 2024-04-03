<?php

/* Database Connection */

/*  */

define("DB_SERVERNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "db_university");

$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
/* var_dump($connection); */

if ($connection && $connection->connect_error) {
    echo "Connection failed" . $connection->connect_error;
    die;
}

$sql1 = "SELECT * FROM `students` WHERE YEAR(date_of_birth) = 1990;";
$result = $connection->query($sql1);
var_dump($result);

/* while ($row = $result->fetch_assoc()) {
    ['name' => $name, 'surname' => $surname, 'date_of_birth' => $dateOfBirth] = $row;
    echo $name . ' ' . $surname . ' ' . $dateOfBirth;
} */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mysqli university</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Date Of Birth</th>
                    <th scope="col">Fiscal Code</th>
                    <th scope="col">Registration Number</th>
                    <th scope="col">email</th>
                    <th scope="col">Enrolment Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) :
                    [
                        'id' => $studentID,
                        'name' => $name,
                        'surname' => $surname,
                        'date_of_birth' => $dateOfBirth,
                        'fiscal_code' => $fiscalCode,
                        'enrolment_date' => $enrolmentDate,
                        'registration_number' => $registrationNumber,
                        'email' => $email
                    ] = $row;
                ?>
                    <tr>
                        <th scope="row"><?= $studentID; ?></th>
                        <td><?= $name; ?></td>
                        <td><?= $surname; ?></td>
                        <td><?= $dateOfBirth; ?></td>
                        <td><?= $fiscalCode; ?></td>
                        <td><?= $registrationNumber; ?></td>
                        <td><?= $email; ?></td>
                        <td><?= $enrolmentDate; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>