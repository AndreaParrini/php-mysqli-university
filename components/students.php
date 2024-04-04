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

if (empty($_POST['yearOfBirth'])) {
    $sql1 = "SELECT * FROM `students`";
    $result = $connection->query($sql1);
}

if (!empty($_POST['yearOfBirth'])) {
    $sql1 = "SELECT * FROM `students` WHERE YEAR(date_of_birth) = " . $_POST['yearOfBirth'];
    $result = $connection->query($sql1);
}

/* var_dump($result); */

/* while ($row = $result->fetch_assoc()) {
    ['name' => $name, 'surname' => $surname, 'date_of_birth' => $dateOfBirth] = $row;
    echo $name . ' ' . $surname . ' ' . $dateOfBirth;
} */
?>
<?php require_once __DIR__ . '/../partials/header.php'; ?>

<div class="container">
    <h3 class="text-center text-uppercase m-3">Studenti</h3>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="yearOfBirth" class="form-label">Search Student by Year of Birth</label>
            <input type="number" class="form-control w-25" name="yearOfBirth" id="yearOfBirth" aria-describedby="emailHelp" min="1900" max="<?= date("Y") ?>">
            <div id="emailHelp" class="form-text">Insert an year between 1900 and <?= date("Y") ?></div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
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
                <th scope="col">Surname</th>
                <th scope="col">Date Of Birth</th>
                <th scope="col">Fiscal Code</th>
                <th scope="col">Registration Number</th>
                <th scope="col">email</th>
                <th scope="col">Enrolment Date</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
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
                <tr class="p-3">
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

<?php require_once __DIR__ . '/../partials/footer.php'; ?>