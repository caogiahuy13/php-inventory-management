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

    <div class="container">
      <div>
        <h1>Product</h1>
      </div>
      <br />

      <form method="post">
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-4">
            <input type="text" name="name" class="form-control" id="name" />
          </div>
        </div>
        <div class="form-group row">
          <label for="description" class="col-sm-2 col-form-label"
            >Description</label
          >
          <div class="col-sm-4">
            <input type="text" name="description" class="form-control" id="description" />
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-4">
            <button type="submit" class="btn btn-primary">Add Product</button>
          </div>
        </div>
      </form>
      <br />

      <div>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Description</th>
              <th scope="col">Quantity</th>
              <!-- <th scope="col">Actions</th> -->
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <!-- <td>
                <button type="button" class="btn btn-primary">
                  <i class="far fa-eye"></i>
                </button>
                <button type="button" class="btn btn-success">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-danger">
                  <i class="far fa-trash-alt"></i>
                </button>
              </td> -->
            </tr>
            <?php
              $username = "root";
              $password = "";
              $server   = "localhost";
              $dbname   = "inventory_management";
              $connect = new mysqli($server, $username, $password, $dbname);

              if ($connect->connect_error) {
                  die("No connection:" . $conn->connect_error);
                  exit();
              }

              $sql = "SELECT * FROM product";
              $result = $connect->query($sql);

              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  echo "<tr>
                          <td scope=\"row\">".$row["product_id"]."</td>
                          <td>".$row["name"]."</td>
                          <td>".$row["description"]."</td>
                          <td>".$row["quantity"]."</td>
                        </tr>";
                }
              } else {
                echo "0 results";
              }
              
              $connect->close();
            ?>
          </tbody>
        </table>
      </div>
    </div>
    
    <?php 
      $username = "root";
      $password = "";
      $server   = "localhost";
      $dbname   = "inventory_management";
      $connect = new mysqli($server, $username, $password, $dbname);

      if ($connect->connect_error) {
          die("No connection:" . $conn->connect_error);
          exit();
      }

      $name = "";
      $description = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if(isset($_POST["name"])) { $name = $_POST['name']; }
          if(isset($_POST["description"])) { $description = $_POST['description']; }

          $sql = "INSERT INTO product (name, description) VALUES ('$name', '$description')";

          if ($connect->query($sql) === TRUE) {
              echo "Add product success";
              echo("<meta http-equiv='refresh' content='1'>");
          } else {
              echo "Error: " . $sql . "<br>" . $connect->error;
          }
      }

      $connect->close();
    ?>

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
