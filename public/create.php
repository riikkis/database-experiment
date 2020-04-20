<?php

/**
 * Riikka Vepsä
 * 17.4.2020
 * 
 * HTML-lomake jolla luodaan uusi tuote tietokantaan.
 *
 */

require "../config.php";
require "../common.php";

if (isset($_POST['submit'])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

  try {
    $connection = new PDO($dsn, $username, $password, $options);

    $new_product = array(
      "yritys" => $_POST['yritys'],
      "tuote"  => $_POST['tuote'],
      "maara"     => $_POST['maara'],
      "hinta"       => $_POST['hinta'],
      "yksikko"  => $_POST['yksikko']
    );

    $sql = sprintf(
      "INSERT INTO %s (%s) values (%s)",
      "products",
      implode(", ", array_keys($new_product)),
      ":" . implode(", :", array_keys($new_product))
    );

    $statement = $connection->prepare($sql);
    $statement->execute($new_product);
  } catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}
?>
<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
  <blockquote><?php echo escape($_POST['tuote']); ?> lisätty onnistuneesti.</blockquote>
<?php endif; ?>

<div class="content content_sub">
  <div class="container">
    <div class="row">
      <div class="textarea col-12">
        <div class="row">
          <h2>Lisää tuote</h2>
        </div>
        <div class="row pb-3" style="overflow-x: auto;">
          <form method="post">
            <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
            <input type="text" name="yritys" id="yritys" placeholder="Yritys">
            <input type="text" name="tuote" id="tuote" placeholder="Tuote">
            <input type="text" name="maara" id="maara" placeholder="Määrä">
            <input type="text" name="hinta" id="hinta" placeholder="Hinta">
            <input type="text" name="yksikko" id="yksikko" placeholder="Yksikkö">
            <input type="submit" name="submit" class="btn btn-secondary align-baseline" value="Lisää">
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