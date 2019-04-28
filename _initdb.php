<?php
  require_once "settings.php";

  $connection = new mysqli($sql_server, $sql_user, $sql_pw, $sql_db);

  if (mysqli_connect_errno()) {
      printf("Could not connect to MySQL databse: %s\n", mysqli_connect_error());
      exit();
  }

  $query = "SELECT ID FROM " . $sql_table;
  $result = mysqli_query($connection, $query);

  if(empty($result)) {
    $query = "CREATE TABLE IF NOT EXISTS " . $sql_table . "(
              id INT NOT NULL AUTO_INCREMENT,
              name VARCHAR(32),
              date DATE,
              time TIME,
              feedback TEXT,
			  status varchar(255) DEFAULT 'In Progress',
              PRIMARY KEY (id)
              )";
    if (mysqli_query($connection, $query)) {
      echo "Table was created successfully.";
    }
    else {
      echo "Fehler: " . $query . "<br>" . mysqli_error($connection);
    }
  } else {
    echo "Table already exists. Cancellation.";
  }

  mysqli_close($connection);
?>
