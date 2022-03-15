<?php
session_start();
if (!isset($_SESSION['filename'])) {
    $_SESSION['filename'] = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $filename = $_FILES['f-upload']['name'];
        $_SESSION['image'] = $filename;
        if (isset($_SESSION['pics'])) {
              array_push($_SESSION['pics'], $filename);
        } else {
            $_SESSION['pics'] = array($filename);
        }
        $file = 'uploads/' . $_FILES['f-upload']['name'];

        if (isset($_POST['submit'])) {
            move_uploaded_file($_FILES['f-upload']['tmp_name'], $file);
            echo "uploaded Successfully!!!";
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Dashboard Template · Bootstrap v5.1</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">



  <!-- Bootstrap core CSS -->
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="../../public/assets/css//style.css" rel="stylesheet">
</head>

<body>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="home.php">Home</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" 
    data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" 
    aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <div class="nav-item text-nowrap">
        <a href='signIn'><button value="yes" name="sigin" class="nav-link px-3 text-white bg-dark">Log In</button></a>
      </div>
    </div>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a href='adduser'><button value="yes" name="signup" class="nav-link px-3 text-white bg-dark">Signup</button></a>
      </div>
    </div>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a href='signIn'><button value="yes" name="logout" class="nav-link px-3 text-white bg-dark">Logout</button></a>
      </div>
    </div>
    </div>
  </header>
<div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <div class="position-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="addblog">
                  <span data-feather="home"></span>
                  Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="orders.php">
                  <span data-feather="file"></span>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="addblog">
                  <span data-feather="shopping-cart"></span>
                  Blog Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="bloghome">
                  <span data-feather="users"></span>
                  Add Blog
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Reports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                 
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"></h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div>
          </div>
          <div> 
            <h2>Admin's Profile</h2>
          
            <?php echo $_SESSION['show']; ?>
            
            

        </div>
        <div>
            <?php echo $_SESSION['showusers']; ?> 
        </div>
      <form action='blog' method='post'>
          <h2>Add New BLOG</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">Add Pic</th>
                  <th scope="col">Blog Name</th>
                  <th scope="col">Type</th>
                
                </tr>
              </thead>
              <form action='bloghome' method='post'>
              <tbody>
              <td>
                <input type='file' value='Add Pic' name='f-upload' >
                <!-- <input type="submit" value="upload" name="submit" style="color:white; background-color:rgb(22,76,122); width:80px; height:40px;"><br><br> -->
              </td>
                <td><input type='box' name='blogname' ></td>
                <td><input type='box' name='type' ></td>
                
                

              </tbody>
            </table>
          </div>
          <div>Write Here</div>
          <textarea rows="15" cols="80" name='write'></textarea>

          <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <button class='btn btn-primary' name='submit' type='submit'>Post</button>
      </div>
    </div>
    </form>

      

        </main>
      </div>
    </div>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js" 
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>