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


$sql1 = "SELECT * FROM `departments`";
$result = $connection->query($sql1);



/* var_dump($result); */

/* while ($row = $result->fetch_assoc()) {
    ['name' => $name, 'surname' => $surname, 'date_of_birth' => $dateOfBirth] = $row;
    echo $name . ' ' . $surname . ' ' . $dateOfBirth;
} */
?>
<?php require_once __DIR__ . '/../partials/header.php'; ?>

<div class="container">
    <?php if ($result->num_rows != 0) : ?>
        <div class="alert alert-success mt-3" role="alert">
            Total Results : <?= $result->num_rows ?>
        </div>
    <?php else : ?>
        <div class="alert alert-danger mt-3" role="alert">
            Non ci sono risultati.
            Total Results : <?= $result->num_rows ?>
        </div>
    <?php endif; ?>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">email</th>
                <th scope="col">Website</th>
                <th scope="col">Head Of Department</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            while ($row = $result->fetch_assoc()) :
                [
                    'id' => $departmentID,
                    'name' => $name,
                    'address' => $address,
                    'phone' => $phone,
                    'email' => $email,
                    'website' => $website,
                    'head_of_department' => $headOfDepartment
                ] = $row;
            ?>
                <tr class="p-3">
                    <th scope="row"><?= $departmentID; ?></th>
                    <td><?= $name; ?></td>
                    <td><?= $address; ?></td>
                    <td><?= $phone; ?></td>
                    <td><?= $email; ?></td>
                    <td><?= $website; ?></td>
                    <td><?= $headOfDepartment; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>