<?php
   require_once('../../database/dbhelper.php');
  $Id = $Title = $Slider = $Description = '';
  if(!empty($_POST)) {
    if(isset($_POST['Id'])) {
      $Id = $_POST['Id'];
    }
    if(isset($_POST['Title'])) {
      $Title = $_POST['Title'];
    }
    if(isset($_POST['Description'])) {
      $Description = $_POST['Description'];
    }if(isset($_POST['Color'])) {
      $Color = $_POST['Color'];
    }
    $file = $_FILES['Slider'];
    $fileName = $_FILES['Slider']['name'];
    $fileTmpName = $_FILES['Slider']['tmp_name'];
    $fileSize = $_FILES['Slider']['size'];
    $fileError = $_FILES['Slider']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower((end($fileExt)));
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    if( in_array($fileActualExt, $allowed) ){
        if($fileError == 0) {
            if($fileSize < 1000000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = '../../upload/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            }
            else {
                echo 'your file is too big';
            }
        }
        else {
            echo 'there was an error uploading your file';
        }
    }
    else {
        echo 'you cannot upload files of this type';
    }
    if(!empty($Title)) {
      if($Id == '') {
        $sql = 'insert into slider(Title, Slider, Description, Color) values("'.$Title.'", "'.$fileNameNew.'", "'.$Description.'", "'.$Color.'")';
      }
      else {
        $sql = 'update slider set Title="'.$Title.'", Slider="'.$fileNameNew.'", Description="'.$Description.'", Color="'.$Color.'"  where Id='.$Id;
      }
      execute($sql);
      header('Location: index.php');
      die();
    }
  }
  if(isset($_GET['Id'])) {
    $Id = $_GET['Id'];
    $sql = 'select * from Slider where Id='.$Id;
    $Slider = executeResultSingle($sql);
    if($Slider != null) {
      $Title = $Slider['Title'];
      $Description = $Slider['Description'];
      $Color = $Slider['Color'];
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="../index.php">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="../index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../Category/index.php">Category</a>
                                    <a class="nav-link" href="../Slider/index.php">Slider</a>
                                    <a class="nav-link" href="../Product/index.php">Product</a>
                                    <a class="nav-link" href="../Oder/index.php">Order</a>
                                    <a class="nav-link" href="../phukien/index.php">Accessory</a>
                                    <a class="nav-link" href="../user/index.php">User</a>
                                </nav>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="../401.php">401 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                           
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      <h1 class="mt-4">Products</h1>
                      <form action="" method="post" enctype="multipart/form-data"  >
                        <div class="col-xl-6">
                          <input type="text" name="Id" id="Id" class="form-control" value="<?=$Id?>">
                          <label for="" >Title</label>
                          <input type="text" name="Title" id="Title" class="form-control" value="<?=$Title?>">
                          <label for="">Slider</label>
                          <input type="file" name="Slider" id="Slider" class="form-control" value="<?=$Slider?>" >
                          <label for="">Description</label>
                          <input type="text" name="Description" id="Description" class="form-control" value="<?=$Description ?>">
                          <label for="">Color</label>
                          <input type="text" class="form-control" name="Color" id="Color" value="<?=$Color?>"  >
                        </div>
                        <button class="btn btn-success">Save</button>

                      </form>
                        
                     
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script type="text/javascript" >
          $(document).ready(function() {
            $('#dataTable').DataTable();
          })
        </script>
    </body>
</html>
