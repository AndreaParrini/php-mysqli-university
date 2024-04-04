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

/* var_dump($_POST); */

if (empty($_POST['semestre']) && empty($_POST['year'])) {
    $sql1 = "SELECT * FROM `courses`";
    $result = $connection->query($sql1);
}

if (!empty($_POST['semestre']) && !empty($_POST['year'])) {
    $sql1 = "SELECT * FROM `courses` WHERE `period` = '" . $_POST['semestre'] . "' AND `year` = " . $_POST['year'];
    $result = $connection->query($sql1);
}
?>
<?php require_once __DIR__ . '/../partials/header.php'; ?>

<div class="container">
    <h3 class="text-center text-uppercase m-3">Corsi</h3>
    <form action="" method="post">
        <div class="d-flex">
            <select class="form-select" name="semestre">
                <option selected disabled>Seleziona il semestre</option>
                <option value="I Semestre">I Semestre</option>
                <option value="II Semestre">II Semestre</option>
            </select>
            <input type="number" name="year" id="year" min="1" max="3">
            <label for="year">Inserisci l'anno di riferimento</label>
        </div>

        <button type="submit" class="btn btn-primary">
            Cerca
        </button>
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