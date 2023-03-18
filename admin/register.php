<?php include "header.php"?>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" autocomplete="off">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="FirstName"
                                            placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="LastName"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="username"
                                        placeholder="Enter Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="Password"
                                        placeholder="Password">
                                </div>
                                <input type="submit" id="register" class="btn btn-primary btn-user btn-block"
                                    value="Register a Account">
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include "footer.php"?>

    <script>
    $(document).ready(function() {
        $("#register").click(function(e) {
            e.preventDefault();
            var fname = $("#FirstName").val();
            var lname = $("#LastName").val();
            var uname = $("#username").val();
            var pass = $("#Password").val();
            var role = "0"
            if (fname == "" || lname == "" || uname == "" || pass == "") {
                alert("Fill all the information");
            } else {
                $.ajax({
                    type: "POST",
                    url: "script.php",
                    data: {
                        fname: fname,
                        lname: lname,
                        uname: uname,
                        pass: pass,
                        role: role
                    },
                    success: function(response) {
                        if (response == "Success") {
                            window.location.href = "login.php";
                        } else if (response == "Failed") {
                            alert("Error occured !");
                        } else if (response == "uname") {
                            alert("Username Already Exists !");
                        }

                    }
                });

            }

        })



    })
    </script>