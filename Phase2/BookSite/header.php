<?php

//header.php

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Book Management Database</title>
        <link rel="canonical" href="">
        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>asset/css/simple-datatables-style.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>asset/css/styles.css" rel="stylesheet" />
    </head>

    <?php 

    if(is_admin_login())
    {

    ?>
    <body class="sb-nav-fixed">

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Book Admin System</a>                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="genre.php">Genre</a>
                            <a class="nav-link" href="author.php">Author</a>
                            <a class="nav-link" href="book.php">Book</a>
                            <a class="nav-link" href="logout.php">Logout</a>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                       
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>


    <?php 
    }
    else
    {

    ?>

    <body>

    	<main>

    		<div class="container py-4">
    			<header class="pb-3 mb-4 border-bottom bg-dark text-white">
                    <div class="row">
        				<div class="col-md-6">
                            <a href="index.php" class="d-flex align-items-center text-light text-decoration-none">
                                <span class="fs-4 align-items-center">Book Management Database</span>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <?php 

                            if(is_user_login())
                            {
                            ?>
                            <ul class="list-inline mt-4 float-end">
                                <li class="list-inline-item"><?php echo $_SESSION['user_id']; ?></li>
                                <li class="list-inline-item"><a href="logout.php">Logout</a></li>
                            </ul>
                            <?php 
                            }

                            ?>
                        </div>
                    </div>
    			</header>
    <?php 
    }
    ?>
    			