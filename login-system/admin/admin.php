<?php
include_once '../php/dbh.inc.php';
if (isset($_GET["error"])) {
    if ($_GET["error"] == "youarenotAdmin!") {
        echo "<script>alert('You are not Admin!')</script>";
    } else if ($_GET["error"] == "none") {
        echo "<script>alert('Welcome Admin!')</script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Admin page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">

    <!----css3---->
    <link rel="stylesheet" href="../../css/admin.css">


    <!--google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">


    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

</head>

<body>
    <?php
    $sql = "SELECT * FROM users;";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    ?>

    <div class="wrapper">

        <div class="body-overlay"></div>

        <!-------sidebar--design------------>

        <div id="sidebar">
            <!-- <div class="sidebar-header">
                <h3><img src="img/logo.png" class="img-fluid" /><span>vishweb design</span></h3>
            </div> -->
            <div class="logo">
                <h1 class="title-logo">Logo</h1>
            </div>
            <ul class="list-unstyled component m-0">
                <!-- <li class="active">
                    <a href="#" class="dashboard"><i class="material-icons">dashboard</i>dashboard </a>
                </li> -->

                <li class="dropdown">
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">aspect_ratio</i>Layouts
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                        <li><a href="#">layout 1</a></li>
                        <li><a href="#">layout 2</a></li>
                        <li><a href="#">layout 3</a></li>
                    </ul>
                </li>


                <li class="dropdown">
                    <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">apps</i>widgets
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu2">
                        <li><a href="#">Apps 1</a></li>
                        <li><a href="#">Apps 2</a></li>
                        <li><a href="#">Apps 3</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">equalizer</i>charts
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu3">
                        <li><a href="#">Pages 1</a></li>
                        <li><a href="#">Pages 2</a></li>
                        <li><a href="#">Pages 3</a></li>
                    </ul>
                </li>


                <li class="dropdown">
                    <a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">extension</i>UI Element
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu4">
                        <li><a href="#">Pages 1</a></li>
                        <li><a href="#">Pages 2</a></li>
                        <li><a href="#">Pages 3</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#homeSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">border_color</i>forms
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu5">
                        <li><a href="#">Pages 1</a></li>
                        <li><a href="#">Pages 2</a></li>
                        <li><a href="#">Pages 3</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#homeSubmenu6" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">grid_on</i>tables
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu6">
                        <li><a href="#">table 1</a></li>
                        <li><a href="#">table 2</a></li>
                        <li><a href="#">table 3</a></li>
                    </ul>
                </li>


                <li class="dropdown">
                    <a href="#homeSubmenu7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">content_copy</i>Pages
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu7">
                        <li><a href="#">Pages 1</a></li>
                        <li><a href="#">Pages 2</a></li>
                        <li><a href="#">Pages 3</a></li>
                    </ul>
                </li>


                <li class="">
                    <a href="#" class=""><i class="material-icons">date_range</i>copy </a>
                </li>
                <li class="">
                    <a href="#" class=""><i class="material-icons">library_books</i>calender </a>
                </li>

            </ul>
        </div>

        <!-------sidebar--design- close----------->



        <!-------page-content start----------->

        <div id="content">

            <!------top-navbar-start----------->

            <div class="top-navbar">
                <div class="xd-topbar">
                    <div class="row">
                        <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
                            <div class="xp-menubar">
                                <span class="material-icons text-white">signal_cellular_alt</span>
                            </div>
                        </div>

                        <div class="col-md-5 col-lg-3 order-3 order-md-2">
                            <div class="xp-searchbar">
                                <form>
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn" type="submit" id="button-addon2">Go
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
                            <div class="xp-profilebar text-right">
                                <nav class="navbar p-0">
                                    <ul class="nav navbar-nav flex-row ml-auto">
                                        <li class="dropdown nav-item active">
                                            <a class="nav-link" href="#" data-toggle="dropdown">
                                                <span class="material-icons">notifications</span>
                                                <span class="notification">4</span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">You Have 4 New Messages</a></li>
                                                <li><a href="#">You Have 4 New Messages</a></li>
                                                <li><a href="#">You Have 4 New Messages</a></li>
                                                <li><a href="#">You Have 4 New Messages</a></li>
                                            </ul>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                <span class="material-icons">question_answer</span>
                                            </a>
                                        </li>
                                        <li class="dropdown nav-item">
                                            <a class="nav-link" href="#" data-toggle="dropdown">
                                                <img src="img/user.jpg" style="width:40px; border-radius:50%;" />
                                                <span class="xp-user-live"></span>
                                            </a>
                                            <ul class="dropdown-menu small-menu">
                                                <li><a href="#">
                                                        <span class="material-icons">person_outline</span>
                                                        Profile
                                                    </a></li>
                                                <li><a href="#">
                                                        <span class="material-icons">settings</span>
                                                        Settings
                                                    </a></li>
                                                <li><a href="../php/logout.inc.php">
                                                        <span class="material-icons">logout</span>
                                                        Logout
                                                    </a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                    </div>

                    <div class="xp-breadcrumbbar text-center">
                        <h4 class="page-title">Dashboard</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Vishweb</a></li>
                            <li class="breadcrumb-item active" aria-curent="page">Dashboard</li>
                        </ol>
                    </div>


                </div>
            </div>
            <!------top-navbar-end----------->


            <!------main-content-start----------->

            <div class="main-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrapper">

                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                                        <h2 class="ml-lg-2">Manage Employees</h2>
                                    </div>
                                    <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                                            <i class="material-icons">&#xE147;</i>
                                            <span>Add New Employees</span>
                                        </a>
                                        <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal">
                                            <i class="material-icons">&#xE15C;</i>
                                            <span>Delete</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><span class="custom-checkbox">
                                                <input type="checkbox" id="selectAll">
                                                <label for="selectAll"></label></th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>UID</th>
                                        <th>Password</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php
                                    if ($num > 0) {
                                        while ($data = mysqli_fetch_assoc($result)) {
                                            echo "
                                            
                                                <tr>
                                                <th><span class='custom-checkbox'>
                                                        <input type='checkbox' id='checkbox1' name='option[]' value='1'>
                                                        <label for='checkbox1'></label></th>
                                                <th>" . $data['usersId'] . "</th>
                                                <th>" . $data['usersName'] . "</th>
                                                <th>" . $data['usersEmail'] . "</th>
                                                <th>" . $data['usersUid'] . "</th>
                                                <th>" . $data['usersPwd'] . "</th>
                                                <th>
                                                <a href='#editEmployeeModal' class='edit' data-toggle='modal'>
                                                    <i class='material-icons' data-toggle='tooltip'
                                                        title='Edit'>&#xE254;</i>
                                                </a>
                                                <a href='#deleteEmployeeModal' class='delete' data-toggle='modal'>
                                                    <i class='material-icons' data-toggle='tooltip'
                                                        title='Delete'>&#xE872;</i>
                                                </a>
                                            </th>
                                        </tr>
                                        
                                                ";
                                        }
                                    }
                                    ?>
                                </tbody>
                                <!-- <th>Thomas Hardy</th>
                                        <th>ThomasHardy@gmail.com</th>
                                        <th>90r parkdground poland Usa.</th>
                                        <th>(78-582552-9)</th> -->



                                <!-- <tr>
                                        <th><span class="custom-checkbox">
                                                <input type="checkbox" id="checkbox2" name="option[]" value="1">
                                                <label for="checkbox2"></label></th>
                                        <th>Dominique Perrier</th>
                                        <th>dominiquePerrier@gmail.com</th>
                                        <th>90r ser57, Berlin poland Bermany.</th>
                                        <th>(78-5235-2-9)</th>
                                        <th>
                                            <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                                                <i class="material-icons" data-toggle="tooltip"
                                                    title="Edit">&#xE254;</i>
                                            </a>
                                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                                                <i class="material-icons" data-toggle="tooltip"
                                                    title="Delete">&#xE872;</i>
                                            </a>
                                        </th>
                                    </tr> -->


                                <!-- <tr>
                                        <th><span class="custom-checkbox">
                                                <input type="checkbox" id="checkbox3" name="option[]" value="1">
                                                <label for="checkbox3"></label></th>
                                        <th>Marai Andres</th>
                                        <th>MarariAndres@gmail.com</th>
                                        <th>90r ser57, Berlin poland Bermany.</th>
                                        <th>(78-239-669)</th>
                                        <th>
                                            <a href="#edit" class="edit" data-toggle="modal">
                                                <i class="material-icons" data-toggle="tooltip"
                                                    title="Edit">&#xE254;</i>
                                            </a>
                                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                                                <i class="material-icons" data-toggle="tooltip"
                                                    title="Delete">&#xE872;</i>
                                            </a>
                                        </th>
                                    </tr> -->

                                <!-- <tr>
                                        <th><span class="custom-checkbox">
                                                <input type="checkbox" id="checkbox4" name="option[]" value="1">
                                                <label for="checkbox4"></label></th>
                                        <th>Vishweb Design</th>
                                        <th>vishwebdesign@gmail.com</th>
                                        <th> B-2 ser57 Nodia East Delhi,India.</th>
                                        <th>(78-239-669)</th>
                                        <th>
                                            <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                                                <i class="material-icons" data-toggle="tooltip"
                                                    title="Edit">&#xE254;</i>
                                            </a>
                                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                                                <i class="material-icons" data-toggle="tooltip"
                                                    title="Delete">&#xE872;</i>
                                            </a>
                                        </th>
                                    </tr> -->

                                <!-- <tr>
                                        <th><span class="custom-checkbox">
                                                <input type="checkbox" id="checkbox5" name="option[]" value="1">
                                                <label for="checkbox5"></label></th>
                                        <th>Vishwajeet Kumar</th>
                                        <th>vishkumar234@gmail.com</th>
                                        <th> B-2 ser57 Nodia East Delhi,India.</th>
                                        <th>(78-555-229)</th>
                                        <th>
                                            <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                                                <i class="material-icons" data-toggle="tooltip"
                                                    title="Edit">&#xE254;</i>
                                            </a>
                                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                                                <i class="material-icons" data-toggle="tooltip"
                                                    title="Delete">&#xE872;</i>
                                            </a>
                                        </th>
                                    </tr> -->




                            </table>

                            <div class="clearfix">
                                <div class="hint-text">showing <b>5</b> out of <b>25</b></div>
                                <ul class="pagination">
                                    <li class="page-item disabled"><a href="#">Previous</a></li>
                                    <li class="page-item "><a href="#" class="page-link">1</a></li>
                                    <li class="page-item "><a href="#" class="page-link">2</a></li>
                                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                                    <li class="page-item "><a href="#" class="page-link">4</a></li>
                                    <li class="page-item "><a href="#" class="page-link">5</a></li>
                                    <li class="page-item "><a href="#" class="page-link">Next</a></li>
                                </ul>
                            </div>









                        </div>
                    </div>


                    <!----add-modal start--------->
                    <div class="modal fade" tabindex="-1" id="addEmployeeModal" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Employees</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="emil" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-success">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!----edit-modal end--------->





                    <!----edit-modal start--------->
                    <div class="modal fade" tabindex="-1" id="editEmployeeModal" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Employees</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="emil" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!----edit-modal end--------->


                    <!----delete-modal start--------->
                    <div class="modal fade" tabindex="-1" id="deleteEmployeeModal" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Employees</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this Records</p>
                                    <p class="text-warning"><small>this action Cannot be Undone,</small></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-success">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!----edit-modal end--------->




                </div>
            </div>

            <!------main-content-end----------->



            <!----footer-design------------->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="footer-in">
                        <p class="mb-0">&copy 2021 Vishweb Design . All Rights Reserved.</p>
                    </div>
                </div>
            </footer>




        </div>

    </div>



    <!-------complete html----------->






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/admin.js"></script>
</body>

</html>