<!DOCTYPE html>
<html>
<head>
     <meta http-equiv="content-type" content="text/html; charset=utf-8">
     <link rel="stylesheet" type="text/css" href="includes/css/style.css">
     <script type="text/javascript" src="javascript/jquery-1.11.2.js"></script>
     <script type="text/javascript" src="javascript/script.js"></script>

     <title>Online shop</title>
</head>
<body>
     <header>
          <a href="index.php"><img src="includes/image/logo.jpg"></a>
          <h1>Online shop</h1>
          <br>
          <h2>CMS</h2>
     </header>
     <?php if (isset($_SESSION['user_id'])) { ?>
         <fieldset>
         <legend>menu</legend>
               <a href="index.php">home</a>
               <a href="index.php?controller=contacts">contact us</a>
               <a href="index.php?controller=news">news</a>
               <a href="index.php?controller=pages">pages</a>
               <a href="index.php?controller=products">products</a>
               <a href="index.php?controller=orders">orders</a>
               <a href="index.php?controller=users">Users</a>
               <a href="index.php?controller=chat">chat (<span id="chatcnt">0</span>)</a>
               <a href="index.php?controller=index&action=logout">Logout</a>
          </fieldset>
          <?php } ?>
          <div class="container">