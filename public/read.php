<?php

/**
 * 
 * Riikka Vepsä
 * 17.4.2020
 * 
 *Funktio, jolla suoritetaan kyselyitä parametrin (tuote) perusteella
 *
 */

require "../config.php";
require "../common.php";

if (isset($_POST['submit'])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

  try  {
    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT * 
            FROM products
            WHERE tuote = :tuote";

    $tuote = $_POST['tuote'];
    $statement = $connection->prepare($sql);
    $statement->bindParam(':tuote', $tuote, PDO::PARAM_STR);
    $statement->execute();

    $result = $statement->fetchAll();
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}
?>
<?php require "templates/header.php"; ?>

<div class="content content_sub">
  <div class="container">
    <div class="row">
      <div class="textarea col-12">
        <div class="row">
          <h2>Etsi tuotteen nimellä</h2>
        </div>
        <div class="row">
          <form method="post">
            <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
            <input type="text" id="tuote" name="tuote" placeholder="esim. 'kurkku'">
            <input type="submit" name="submit" value="Hae" class="btn btn-secondary align-baseline">
          </form>
        </div>
        <div class="row py-5">
          <?php  
          if (isset($_POST['submit'])) {
            if ($result && $statement->rowCount() > 0) { ?>
            <h2>Tuotteet</h2>
        </div>
        <div class="row pb-3" style="overflow-x: auto;">
          <table style="width: 100%;">
            <thead>
              <tr>
              <th>Tuote</th>
                <th>Yritys</th>          
                <th>Määrä</th>
                <th>Yksikkö</th>
                <th>Hinta € / myyntierä</th>          
              </tr>
            </thead>
            <tbody>
              <?php foreach ($result as $row) : ?>
                <tr>
                  <td><strong><?php echo escape($row["tuote"]); ?></strong></td>
                  <td><?php echo escape($row["yritys"]); ?></td>
                  <td><?php echo escape($row["maara"]); ?></td>
                  <td><?php echo escape($row["yksikko"]); ?></td>
                  <td><?php echo escape($row["hinta"]); ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
            <?php 
            } else { 
            ?>
              <blockquote>Ei tuloksia hakusanalla '<?php echo escape($_POST['tuote']); ?>'.</blockquote>
              <?php } 
            } ?> 
        </div>
        <div class="row">
          <a href="frontpage.php">Etusivulle</a> 
        </div>                    
      </div>
    </div>
  </div>
</div>

<?php require "templates/footer.php"; ?>