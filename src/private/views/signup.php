<?php

?>


<html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>SignUp Template · Bootstrap v5.1</title>

  <!-- Bootstrap core CSS -->
  <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">


  <style>

<?php include_once('../node_modules/bootstrap/dist/css/bootstrap.min.css') ?>

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
  <link href="./assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin w-50 m-auto pt-5">
  <span class="float-start me-2"><a href="/public/index" class="btn btn-primary">Home</a></span>
  <span class="float-end me-2"><a href="/public/login" class="btn btn-primary">Login</a></span>
    <form action="" method="POST">
      <div><span><h1 class="h3 mb-3 fw-normal">Sign Up</h1> </span> </div>

      <div class=" w-50 m-auto form-floating">
        <input type="text" class="form-control" id="floatingFullName" name="fullname" placeholder="FullName">
        <label for="floatingFullName">Full Name</label>
      </div>
      <div class=" w-50 m-auto form-floating">
        <input type="text" class="form-control" id="floatingUserName" name="username" placeholder="UserName">
        <label for="floatingUserName">User Name</label>
      </div>
      <div class=" w-50 m-auto form-floating">
        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <div class=" w-50 m-auto form-floating">
        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>


      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="Accept the conditions"> Accept the conditions
        </label>
      </div>
      <button class="w-50 btn btn-lg btn-primary" name="btn-signup" type="submit">Sign Up</button>
      <p class="mt-5 mb-3 text-muted">&copy; CEDCOSS Technologies</p>
    </form>
  </main>



</body>

</html>