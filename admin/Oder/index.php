<?php
  require_once('../../database/dbhelper.php');
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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.14/css/jquery.dataTables.min.css">
        <link href="../assets/demo/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="../index.php">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
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
                   <h1 class="mt-4">Category</h1>
                   <div class="container-fluid px-4">
                     <div class="row">
                        <div class="col-md-12 main-datatable">
                            <div class="card_body">
                                <div class="row d-flex">
                                    <div class="col-sm-4 createSegment"> 
                                    <a class="btn dim_button create_new" href="../Category/add.php" > <span class="glyphicon glyphicon-plus"></span> Create New</a>
                                    </div>
                                    <div class="col-sm-8 add_flex">
                                        <div class="form-group searchInput">
                                            <label for="email">Search:</label>
                                            <input type="search" class="form-control" id="filterbox" placeholder=" ">
                                        </div>
                                    </div> 
                                </div>
                                <div class="overflow-x">
                                    <table style="width:100%;" id="filtertable" class="table cust-datatable dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th style="min-width:50px;">ID</th>
                                                <th style="min-width:150px;">Name</th>
                                                <th style="min-width:150px;">Phone</th>
                                                <th style="min-width:100px;">Description</th>
                                                <th style="min-width:100px;">Email</th>
                                                <th style="min-width:100px;">Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                            $sql = 'select * from oder';
                                            $categoryList = executeResult($sql);
                                            $index = 1;
                                            foreach($categoryList as $item) {
                                              echo '
                                                <tr>
                                                  <td>'.($index++).'</td>
                                                  <td>'.$item['Name'].'</td>
                                                  <td>'.$item['Phone'].'</td>
                                                  <td>'.$item['Description'].'</td>
                                                  <td>'.$item['Email'].'</td>
                                                  <td>'.$item['Address'].'</td>
                                                </tr>  
                                              ';
                                            }
                                          ?>
                                              
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                          </div>
                      </div>
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
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.14/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/1.10.14/js/jquery.dataTables.min.js"></script>
        <script src="https://code.jquery.com/jquery-latest.js"></script>
        <script type="text/javascript">
          function deleteCategory(IdCategory) {
            var option=confirm('Ban co muon xoa danh muc nay ko');
            if(!option){
                return;
            }
            $.post('../Category/ajax.php',{
                'IdCategory':IdCategory,
                'action':'delete'
            },function(data){
                // location.reload()
            })
          }
          $(document).ready(function () {
                var dataTable = $('#filtertable').DataTable({
                    pageLength: 5,
                    aoColumnDefs: [
                        {
                            bSortable: false,
                            aTargets: ['nosort'],
                        },
                    ],
                    columnDefs: [{ type: 'date-dd-mm-yyyy', aTargets: [5] }],
                    aoColumns: [null, null, null, null, null, null, null],
                    order: false,
                    bLengthChange: false,
                    dom: '<"top">ct<"top"p><"clear">',
                });
                $('#filterbox').keyup(function () {
                    dataTable.search(this.value).draw();
                });
            });
        </script>
    </body>
</html>
