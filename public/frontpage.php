<?php

/**
 * Riikka Vepsä
 * 17.4.2020
 * 
 * Etusivu
 *
 */

 include "templates/header.php"; ?>

<body>
  <div class="intro">
    <strong><h1>Lähiruokakauppa</h1></strong>
    <button type="button" class="btn btn-secondary btn-lg"><a href="read.php">Ostoksille</a></button>
  </div>
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-12 bigtext">
          <p>Yhä useampi kuluttaja haluaa tietää nauttimansa ravinnon alkuperän, syödä puhtaasti ja hillitä omaa hiilijalanjälkeään tekemällä kestäviä valintoja arjessaan.<p>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="textarea col-12">
          <div class="row">            
            <div class="col-md-6 p-2">
              <p>Haluaisitko sinä löytää lähiruoan tuottajia alueeltasi?</p>
              <div class="button-wrapper">
                <button type="button" class="btn btn-secondary"><a href="read.php">Ostajille</a></button>
              </div>
            </div>            
            <div class="col-md-6 p-2">
              <p>Onko sinulla tuottajana tarjottavaa lähiruoan ystäville?</p>
              <div class="button-wrapper">
                <button type="button" class="btn btn-secondary"><a href="sellers.php">Myyjille</a></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<?php include "templates/footer.php"; ?>