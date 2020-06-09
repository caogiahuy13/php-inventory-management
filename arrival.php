<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="index.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Product</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Navbar</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarColor01"
        aria-controls="navbarColor01"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#"
              >Home <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./addProduct.html">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./arrival.html">Arrival</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./shipment.html">Shipment</a>
          </li>
        </ul>
      </div>
    </nav>

    <?php 
      session_start(); 

      $username = "root";
      $password = "";
      $server   = "localhost";
      $dbname   = "inventory_management";
      $connect = new mysqli($server, $username, $password, $dbname);

      if ($connect->connect_error) {
          die("No connection:" . $conn->connect_error);
          exit();
      }

      $id = 0;
      $name = $description = "";
      $quantity = 0;
    
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT id, name, description, quantity FROM product WHERE product_id = $id";

        $result = $connect->query($sql);

        if (!empty($result) && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $_SESSION["name"] = $row["name"];
                $description = $row["description"];
                
            } 
        }

      } else {
        
      }

      $connect->close();
    ?>

    <div class="container">
      <div>
        <h1>Product</h1>
      </div>
      <br />

      <form method="post">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Name</label>
          <label class="col-sm-2 col-form-label">
              <?php
                echo $_GET['id'];
            ?>
            </label>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Name</label>
          <label class="col-sm-2 col-form-label"><?php echo $_GET['name'] ?></label>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Name</label>
          <label class="col-sm-2 col-form-label"><?php echo $_GET['description'] ?></label>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Name</label>
          <label class="col-sm-2 col-form-label"><?php echo $_GET['quantity'] ?></label>
        </div>
        <div class="form-group row">
            <label for="example-number-input" class="col-2 col-form-label"><?php echo $_GET['description'] ?></label>
            <div class="col-10">
                <input class="form-control" type="number" value="42" id="example-number-input">
            </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-4">
            <button type="submit" class="btn btn-primary">Arrival</button>
          </div>
        </div>
      </form>
      <br />


    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
