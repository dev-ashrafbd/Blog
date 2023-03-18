<?php include "header.php"?>
<?php session_start();

if (!isset($_SESSION['name'])) {
    header("Location:login.php");
}
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "sidebar.php" ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- End of Topbar -->
                <?php include "top-bar.php" ?>
                <!-- End of Topbar -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h2 mb-4 text-gray-800">User Data</h1>


                    <div class="col-sm-12 text-right mb-3">
                        <!-- Button trigger modal -->
                        <button type="button" id="profile" class="btn btn-primary" data-toggle="modal" data-target="#adduser">
                        Add User
                        </button>
                        <!-- Modal -->
                        <div class="modal fade text-left" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form action="script.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label for="fname">First Name</label>
                                        <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" value="">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label for="lname">Last Name</label>
                                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-6" >
                                            <label for="uname">Username</label>
                                            <input type="text" class="form-control" id="newusername" name="newusername" placeholder="Username" value="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label for="phone">Phone</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone No">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <select class="custom-select" id="role" name="role">
                                            <option value="" selected>Select role</option>
                                            <option value="0">Admin</option>
                                            <option value="1">Normal</option>
                                        </select>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" id="add"  name="add" class="btn btn-primary">Add</button>
                                </div>

                                </div>
                            </div>
                        </div>
                    </div>




                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">User</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>Phone</th>
                                            <th>Profession</th>
                                            <th>Address</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $con = mysqli_connect("localhost","root","","blog") or die("Database not connected".mysqli_connect_error());
                                                $sql="SELECT *FROM register";
                                                $result=mysqli_query($con,$sql);

                                                while($row = mysqli_fetch_assoc($result)){
                                                    
                                            
                                        ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row['fname']." ".$row['lname']?>
                                                </td>
                                                <td>
                                                    <?php echo $row['email']?>
                                                </td>
                                                <td>
                                                    <?php echo $row['uname']?>
                                                </td>
                                                <td>
                                                    <?php 
                                                    if($row['role']==1){
                                                        echo "Admin";
                                                    }
                                                    else if($row['role']==""){
                                                        echo "Not Defined";
                                                    }
                                                    else{
                                                        echo "Author";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['phone']?>
                                                </td>
                                                <td>
                                                    <?php echo $row['profession']?>
                                                </td>
                                                <td>
                                                    <?php echo $row['address']?>
                                                </td>
                                                <td><a href=""><i class="fa fa-edit"></i></a></td>
                                                <td><a href=""><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <?php
                                }
                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div> 
            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    <?php include "footer.php"?>
    <script>
$(document).ready(function(){

     /**
     * Update Profile
     */

    $("#add").click(function(e){
        e.preventDefault();
            var fsname=$("#fname").val();
            var lsname=$("#lname").val();
            var email=$("#email").val();
            var newusername=$("#newusername").val();
            var password=$("#password").val();
            var phone=$("#phone").val();
            var role=$("#role").val();
            if(fsname=="" || lsname=="" || newusername=="" || password=="" || role=="" ){
                alert("Fill all the information");
            }
            else{
            $.ajax({
             type: "POST",
             url: "script.php",
             data: {
                fsname:fsname,
                lsname:lsname,
                email:email,
                newusername:newusername,
                password:password,
                phone:phone,
                role:role
                },

             success: function (response) {
					if(response=="Success"){
                        window.location.href = "user.php";				
					}
					else if(response=="Failed"){
					   alert("failed !");
					}
					else if(response=="uname"){
					   alert("Username Exist !");
					}
				}
         });
        }
     });

})
</script>