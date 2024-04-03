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

$sql1 = "SELECT * FROM `teachers`";
$result = $connection->query($sql1);
/* var_dump($result); */

/* while ($row = $result->fetch_assoc()) {
    ['name' => $name, 'surname' => $surname, 'date_of_birth' => $dateOfBirth] = $row;
    echo $name . ' ' . $surname . ' ' . $dateOfBirth;
} */
?>
<?php require_once __DIR__ . '/../partials/header.php'; ?>

<div class="container">
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Phone</th>
                <th scope="col">Office Address</th>
                <th scope="col">Office Number</th>
                <th scope="col">email</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            while ($row = $result->fetch_assoc()) :
                [
                    'id' => $studentID,
                    'name' => $name,
                    'surname' => $surname,
                    'phone' => $phone,
                    'office_address' => $officeAddress,
                    'office_number' => $officeNumber,
                    'email' => $email
                ] = $row;
            ?>
                <tr class="p-3">
                    <th scope="row"><?= $studentID; ?></th>
                    <td><?= $name; ?></td>
                    <td><?= $surname; ?></td>
                    <td><?= $phone; ?></td>
                    <td><?= $officeAddress; ?></td>
                    <td><?= $officeNumber; ?></td>
                    <td><?= $email; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>