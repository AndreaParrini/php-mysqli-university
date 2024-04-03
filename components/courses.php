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

$sql1 = "SELECT * FROM `courses`";
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
                <th scope="col">Description</th>
                <th scope="col">Period</th>
                <th scope="col">Year</th>
                <th scope="col">CFU</th>
                <th scope="col">Website</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            while ($row = $result->fetch_assoc()) :
                [
                    'id' => $courseID,
                    'name' => $name,
                    'description' => $description,
                    'period' => $period,
                    'year' => $year,
                    'cfu' => $cfu,
                    'website' => $website
                ] = $row;
            ?>
                <tr class="p-3">
                    <th scope="row"><?= $courseID; ?></th>
                    <td><?= $name; ?></td>
                    <td><?= $description; ?></td>
                    <td><?= $period; ?></td>
                    <td><?= $year; ?></td>
                    <td><?= $cfu; ?></td>
                    <td><?= $website; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>