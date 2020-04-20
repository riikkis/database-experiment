<?php include "templates/header.php"; ?>
<div class="content content_sub">
  <div class="container">
      <div class="textarea col-12">
        <h1>Palveluntuottajille</h1>
        <div class="row justify-content-around">
            <div class="col-md-3 col-12 box">
                <div class="elementti">  
                    <p>Lisää tuotteita.</p>
                    <div class="button-wrapper">
                        <button type="button" class="btn btn-secondary"><a href="create.php">Lisää</a></button>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-12 box">
                <p>Päivitä tietoja.</p>
                <div class="button-wrapper">
                    <button type="button" class="btn btn-secondary"><a href="update.php">Päivitä</a></button>
                </div>
            </div>
            <div class="col-md-3 col-12 box">
                <p>Poista tuotetietoja.</p>
                <div class="button-wrapper">
                    <button type="button" class="btn btn-secondary"><a href="delete.php">Poista</a></button>
                </div>
            </div>            
        </div>
        <div class="spacing">
          <a href="frontpage.php">Etusivulle</a>
        </div>                  
      </div>
  </div>
</div>

<?php include "templates/footer.php"; ?>