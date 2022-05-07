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
    $rowcount = mysqli_num_rows($result);
    ?>

    <div class="wrapper">

        <div class="body-overlay"></div>

        <?php
        require './admin-sidebar.php'
        ?>



        <!-------page-content start----------->

        <div id="content">

            <?php
            require './admin-header.php'
            ?>



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
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php
                                    
                                    if ($num > 0) {
                                        while ($data = mysqli_fetch_assoc($result)) {
                                            $thisID=$data['usersId'];
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
                                                <th>" . $data['usersStatus'] . "</th>
                                                <th>" ;
                                                echo'<form action ="../php/status.php"  method="post">
                                                <input type="hidden" name="id" value="'.$thisID.'" >';
                                                
                                                if($data['usersStatus']==0){
                                                echo $thisID.'
                                                     <input type="submit" name="ban" value="ban user"/></br>
                                                    <input type="submit" name="admin" value="make admin"/>
                                                ';}
                                                else if($data['usersStatus']==-1){
                                                echo'<input type="submit" name="free" value="free user"/>
                                                <input type="submit" name="deny" value="deny access"/>'
                                                ;    
                                                }
                                                else if($data['usersStatus']==99){
                                                    echo'Admin
                                                    ';
                                                }
                                                   
                                                echo'</form></th>';
                                                echo"
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





                            </table>

                            <div class="clearfix">
                                <?php
                                echo "<div class='hint-text'>showing <b>" . $rowcount . "</b> out of <b>" . $rowcount . "</b></div>"
                                ?>
                                <!-- <div class='hint-text'>showing <b>5</b> out of <b>25</b></div> -->
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
                <?php
                require '../../footer.php'
                ?>
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