CREATE DATABASE lahiruokakauppa;

  use lahiruokakauppa;

  CREATE TABLE products (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    yritys VARCHAR(30) NOT NULL,
    tuote VARCHAR(50) NOT NULL,
    maara INT(4),
    hinta INT(5),
    yksikko VARCHAR(10),
    date TIMESTAMP
  );