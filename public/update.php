<?php

/**
 * Riikka Vepsä
 * 17.4.2020
 * Funktio joka listaa kaikki tuotteet
 * Muokkaa-nappi avaa update-single.php:n 
 * jossa yksittäistä tuotetta voi muokata.
 */

require "../config.php";
require "../common.php";

try {
  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM products";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch (PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>
<?php require "templates/header.php"; ?>

<div class="content content_sub">
  <div class="container">
    <div class="row">
      <div class="textarea col-12">
        <div class="row">
          <h2>Päivitä tuotetietoja</h2>
        </div>
        <div class="row pb-3" style="overflow-x: auto;">
          <table style="width: 100%;">
            <thead>
              <tr>
                <th>#</th>
                <th>Yritys</th>
                <th>Tuote</th>
                <th>Määrä</th>
                <th>Hinta</th>
                <th>Yksikkö</th>
                <th>Date</th>
                <th>Muokkaa</th>
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
                  <td><a href="update-single.php?id=<?php echo escape($row["id"]); ?>" class="btn btn-secondary btn-update align-baseline">Muokkaa</a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
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