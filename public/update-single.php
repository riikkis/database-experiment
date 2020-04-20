<?php

/**
 * Riikka Vepsä
 * 17.4.2020
 * HTML-lomake tuotetietojen muokkaamiseen.
 *
 */

require "../config.php";
require "../common.php";

if (isset($_POST['submit'])) {
    if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $product = [
            "id"        => $_POST['id'],
            "yritys" => $_POST['yritys'],
            "tuote"  => $_POST['tuote'],
            "maara"     => $_POST['maara'],
            "hinta"       => $_POST['hinta'],
            "yksikko"  => $_POST['yksikko'],
            "date"      => $_POST['date']
        ];

        $sql = "UPDATE products 
            SET id = :id, 
              yritys = :yritys, 
              tuote = :tuote, 
              maara = :maara, 
              hinta = :hinta,
              yksikko = :yksikko,
              date = :date 
            WHERE id = :id";

        $statement = $connection->prepare($sql);
        $statement->execute($product);
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

if (isset($_GET['id'])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $id = $_GET['id'];

        $sql = "SELECT * FROM products WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();

        $product = $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
} else {
    echo "Jotain meni pieleen :(";
    exit;
}
?>

<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
    <blockquote>Tuote '<?php echo escape($_POST['tuote']); ?>' päivitetty onnistuneesti.</blockquote>
<?php endif; ?>

<div class="content content_sub">
  <div class="container">
    <div class="row">
      <div class="textarea col-12">
        <div class="row">
          <h2>Päivitä tuotetietoja</h2>
        </div>
        <div class="row pb-3" style="overflow-x: auto;">
          <form method="post">
            <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
            <table style="width: 100%">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Yritys</th>
                  <th>Tuote</th>
                  <th>Määrä</th>
                  <th>Hinta</th>
                  <th>Yksikkö</th>
                  <th>Date</th>
                  <th>Päivitä</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php foreach ($product as $key => $value) : ?>
                    <td><input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>></td>
                  <?php endforeach; ?>
                  <td><button type="submit" class="btn btn-secondary align-baseline" name="submit" value="<?php echo escape($row["id"]); ?>">Päivitä</button></td>
                </tr>
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