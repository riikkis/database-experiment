<?php

/**
 * Riikka Vepsä
 * 17.4.2020
 * 
 * Poistaa tuotteita tietokannasta
 */

require "../config.php";
require "../common.php";

$success = null;

if (isset($_POST["submit"])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

  try {
    $connection = new PDO($dsn, $username, $password, $options);
  
    $id = $_POST["submit"];

    $sql = "DELETE FROM products WHERE id = :id";

    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $success = "Tuote poistettu onnistuneesti";
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}

try {
  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM products";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>

<?php require "templates/header.php"; ?>

<?php if ($success) echo $success; ?>

<div class="content content_sub">
  <div class="container">
    <div class="row">
      <div class="textarea col-12">
        <div class="row">
          <h2>Poista tuotetietoja</h2>
        </div>
        <div class="row pb-3" style="overflow-x: auto;">
          <form method="post" style="width: 100%;">
            <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
            <table style="width: 100%;">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Yritys</th>
                  <th>Tuote</th>
                  <th>Määrä</th>
                  <th>Hinta</th>
                  <th>Yksikkö</th>
                  <th>Päivämäärä</th>
                  <th>Poista</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($result as $row) : ?>
                <tr>
                  <td><?php echo escape($row["id"]); ?></td>
                  <td><?php echo escape($row["yritys"]); ?></td>
                  <td><?php echo escape($row["tuote"]); ?></td>
                  <td><?php echo escape($row["maara"]); ?></td>
                  <td><?php echo escape($row["hinta"]); ?></td>
                  <td><?php echo escape($row["yksikko"]); ?></td>
                  <td><?php echo escape($row["date"]); ?> </td>
                  <td><button type="submit" class="btn btn-secondary btn-update align-baseline" name="submit" value="<?php echo escape($row["id"]); ?>">Poista</button></td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </form>
        </div>
        <div class="row">
          <a href="sellers.php">< Takaisin</a>
        </div>
        <div class="row">
          <a href="frontpage.php"><< Etusivulle</a> 
        </div>
      </div>
    </div>
  </div>
</div>

<?php require "templates/footer.php"; ?>