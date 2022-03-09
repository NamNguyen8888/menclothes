<?php
    require_once('../../database/dbhelper.php');
    $IdProduct = $ProductName = $Image = $Price = $Description = $ImageOne = $IdCategory ='';
    if(!empty($_POST)) {
        if(isset($_POST['IdProduct'])) {
            $IdProduct = $_POST['IdProduct'];
        }
        if(isset($_POST['ProductName'])) {
            $ProductName = $_POST['ProductName'];
        }
        if(isset($_POST['Price'])) {
            $Price = $_POST['Price'];
        }
        if(isset($_POST['Description'])) {
            $Description = $_POST['Description'];
        }
        if(isset($_POST['IdCategory'])) {
            $IdCategory = $_POST['IdCategory'];
        }
        $file = $_FILES['Image'];
        $fileName = $_FILES['Image']['name'];
        $fileTmpName = $_FILES['Image']['tmp_name'];
        $fileSize = $_FILES['Image']['size'];
        $fileError = $_FILES['Image']['error'];
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

        $fileOne = $_FILES['ImageOne'];
        $fileNameOne = $_FILES['ImageOne']['name'];
        $fileTmpNameOne = $_FILES['ImageOne']['tmp_name'];
        $fileSizeOne = $_FILES['ImageOne']['size'];
        $fileErrorOne = $_FILES['ImageOne']['error'];
        $fileTypeOne = $_FILES['fileOne']['type'];
        $fileExtOne = explode('.', $fileName);
        $fileActualExtOne = strtolower((end($fileExt)));
        $allowedOne = array('jpg', 'jpeg', 'png', 'pdf');
        if( in_array($fileActualExtOne, $allowedOne) ){
            if($fileErrorOne == 0) {
                if($fileSizeOne < 1000000) {
                    $fileNameNewOne = uniqid('', true).".".$fileActualExtOne;
                    $fileDestinationOne = '../../upload/'.$fileNameNewOne;
                    move_uploaded_file($fileTmpNameOne, $fileDestinationOne);
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
        if(isset($ProductName)) {
            $CreateAt = $UpdateAt = date('Y-m-d H:s:i');
            if($IdProduct == '') {
                $sql = 'insert into products(ProductName, Price, Image, ImageOne, Description, IdCategory, CreateAt, UpdateAt ) values("'.$ProductName.'", "'.$Price.'", "'.$fileNameNew.'", "'.$fileNameNewOne.'", "'.$Description.'", "'.$IdCategory.'", "'.$CreateAt.'", "'.$UpdateAt.'" )';
            }
            else {
                $sql = 'update products set ProductName = "'.$ProductName.'", Price ="'.$Price.'", Image="'.$fileNameNew.'", ImageOne = "'.$fileNameNewOne.'", Description ="'.$Description.'", IdCategory = "'.$IdCategory.'" where IdProduct='.$IdProduct;
            }
            execute($sql);
            header('Location: index.php');
            die();
        }
    }
    if(isset($_GET['IdProduct'])) {
        $IdProduct=$_GET['IdProduct'];
        $sql = 'select * from products where IdProduct='.$IdProduct;
        $productList = executeResultSingle($sql);
        if($productList != null) {
            $ProductName = $productList['ProductName'];
            $Image = $productList['Image'];
            $Price = $productList['Price'];
            $Description = $productList['Description'];
            $ImageOne = $productList['ImageOne'];
            $IdCategory = $productList['IdCategory'];
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
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
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
                          <input type="text" class="form-control mb-4" name="IdProduct" id="IdProduct" value="<?=$IdProduct?>" hidden="true" >
                          <label for="" class="mb-2">Product Name</label>
                          <input type="text" class="form-control mb-4" name="ProductName" id="ProductName" value="<?=$ProductName?>" >
                          <label for="" class="mb-2">Image</label>
                          <input type="file" class="form-control mb-4" name="Image" id="Image" value="<?=$Image?>" onchange="updateImage()" >
                          <img src="'.$fileDestinationOne.'" alt="" style="max-width: 200px; max-height: 200px;" id="Image_thumbnail">
                          <label for="" class="mb-2">Description</label>
                          <input type="text" class="form-control mb-4" name="Description" id="Description" value="<?=$Description?>">
                          <label for="" class="mb-2">Price</label>
                          <input type="text" class="form-control mb-4" id="Price" name="Price" value="<?=$Price?>">
                          <label for="" class="mb-2">Image 1</label>
                          <input type="file" class="form-control mb-4" name="ImageOne" id="ImageOne" value="<?=$ImageOne?>" >
                          <label for="" class="mb-2">Category</label>
                          <select class="form-control mb-4" name="IdCategory" id="IdCategory" value="<?= $IdCategory ?>" >
                            <option value="">-- Lua chon --</option>
                            <?php
                                $sql = 'select * from category';
                                $categoryList = executeResult($sql);
                                foreach($categoryList as $item) {
                                    if($item['IdCategory'] == $IdCategory ) {
                                        echo '<option selected value ="'.$item['IdCategory'].'" >'.$item['Category'].'</option>';  
                                    }else {
                                        echo '<option value ="'.$item['IdCategory'].'" >'.$item['Category'].'</option>';
                                    }
                                }
                            ?>
                          </select>
                          
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
