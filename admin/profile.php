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
                <div class="container">
                    <div class="main-body">
                        <div class="row mb-4 text-right">
                            <div class="col-sm-12">
                                <!-- Button trigger modal -->
                                <button type="button" id="profile" class="btn btn-primary" data-toggle="modal"
                                    data-target="#editeprofile">
                                    Edit Profile
                                </button>
                                <!-- Modal -->
                                <div class="modal fade text-left" id="editeprofile" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update info</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form enctype="multipart/form-data">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="fname">First Name</label>
                                                            <input type="text" class="form-control" id="fname"
                                                                placeholder="First Name" value="">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="lname">Last Name</label>
                                                            <input type="text" class="form-control" id="lname"
                                                                placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control" id="email"
                                                                placeholder="Email">
                                                        </div>
                                                        <fieldset class="form-group col-md-6" disabled>
                                                            <div>
                                                                <label for="uname">Username</label>
                                                                <input type="text" class="form-control" id="uname"
                                                                    placeholder="Username"
                                                                    value="<?php echo $_SESSION['name']?>">
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Address">Address</label>
                                                        <input type="text" class="form-control" id="address"
                                                            placeholder="1234 Main St">
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="phone">Phone</label>
                                                            <input type="tel" class="form-control" id="phone"
                                                                name="phone" placeholder="Mobile">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="prof">Profession</label>
                                                            <input type="text" class="form-control" id="prof"
                                                                placeholder="Profession">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" id="update"
                                                    class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters-sm">
                            <?php
                        $con = mysqli_connect("localhost","root","","blog") or die("Database not connected".mysqli_connect_error());
                            $select=$_SESSION['name'];
                            $sql="SELECT *FROM register WHERE uname='{$select}'";
                            $result=mysqli_query($con,$sql);
                            if(mysqli_num_rows($result) == 1) {

                             $row = mysqli_fetch_assoc($result)
                                
                        
                        ?>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <!-- Button trigger modal -->
                                            <img src="img/upload/<?php echo $row['image']?>" alt="Admin"
                                                class="rounded-circle" width="150" id="profileimg" data-toggle="modal"
                                                data-target="#profileimage">

                                            <!-- Modal -->
                                            <div class="modal fade" id="profileimage" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Update
                                                                Image</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="script.php"
                                                                enctype="multipart/form-data">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input"
                                                                        name="profileimg" id="profileimg">
                                                                    <input type="hidden" class="custom-file-input"
                                                                        name="username" id="username"
                                                                        value="<?php echo $_SESSION['name']?>">
                                                                    <label class="custom-file-label"
                                                                        for="customFile">Choose file</label>
                                                                </div>
                                                                <div class="text-center mt-3" id="preview"><img
                                                                        src="img/upload/<?php echo $row['image']?>"
                                                                        alt="Admin" class="rounded-circle" width="150">
                                                                </div>

                                                                <input type="submit" name="upprofileimg"
                                                                    id="upprofileimg" class="btn btn-primary mt-3"
                                                                    value="Upload">
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <h4><?php echo $row['uname']?></h4>
                                                <p class="text-secondary mb-1"><?php echo $row['profession']?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Full Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $row['fname']." ".$row['lname']?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Email</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $row['email']?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Profession</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $row['profession']?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Mobile</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $row['phone']?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Address</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $row['address']?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
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
    $(document).ready(function() {

        /**
         * Show Profile
         */

        $("#profile").click(function(e) {
            e.preventDefault();
            var usname = $("#uname").val();

            $.ajax({
                type: "POST",
                url: "script.php",
                data: {
                    username: usname
                },
                dataType: "json",
                success: function(data) {
                    if (data.error == '') {
                        $("#fname").val(data.register.fname);
                        $("#lname").val(data.register.lname);
                        $("#email").val(data.register.email);
                        $("#address").val(data.register.address);
                        $("#phone").val(data.register.phone);
                        $("#prof").val(data.register.profession);

                    }
                }
            });
        });

        /**
         * Update Profile
         */

        $("#update").click(function(e) {
            e.preventDefault();
            var fsname = $("#fname").val();
            var lsname = $("#lname").val();
            var email = $("#email").val();
            var usname = $("#uname").val();
            var address = $("#address").val();
            var phone = $("#phone").val();
            var prof = $("#prof").val();
            $.ajax({
                type: "POST",
                url: "script.php",
                data: {
                    fsname: fsname,
                    lsname: lsname,
                    email: email,
                    usname: usname,
                    address: address,
                    phone: phone,
                    prof: prof
                },

                success: function(response) {
                    if (response == "Success") {
                        window.location.href = "profile.php";
                    } else if (response == "Failed") {
                        alert("Wrong username or password !");
                    }
                }
            });
        });

        /**
         * Get Profile Image name
         */

        $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            var tmppath = URL.createObjectURL(e.target.files[0]);
            $('.custom-file-label').html(fileName);
            $("img").fadeIn("fast").attr('src', tmppath);
        });



    })
    </script>