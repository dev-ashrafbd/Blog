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
                    <h1 class="h2 mb-4 text-gray-800">Category</h1>


                    <div class="col-sm-12 text-right mb-3">
                        <!-- Button trigger modal -->
                        <button type="button" id="profile" class="btn btn-primary" data-toggle="modal" data-target="#addcate">
                        Add Category
                        </button>
                        <!-- Modal -->
                        <div class="modal fade text-left" id="addcate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="title">Category Name</label>
                                        <input type="text" class="form-control" id="cname" name="cname" placeholder="Enter Category Name">
                                    </div>
                                </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" id="addcat"  name="addcat" class="btn btn-primary">Add</button>
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
                                            <td>No.</td>
                                            <th>Name</th>
                                            <th>Posts</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $con = mysqli_connect("localhost","root","","blog") or die("Database not connected".mysqli_connect_error());
                                                $sql="SELECT *FROM category";
                                                $result=mysqli_query($con,$sql);
                                                $i=1;

                                                while($row = mysqli_fetch_assoc($result)){
                                                    
                                            
                                        ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i;?>
                                                </td>
                                                <td>
                                                    <?php echo $row['name']?>
                                                </td>
                                                <td>
                                                    <?php echo $row['posts']?>
                                                </td>
                                                <td><span class='update' data-id='<?= $row['id']; ?>' data-toggle="modal" data-target="#upcate"><i class="fa fa-edit"></i></span></td>
                                                <td><span class='delete' data-id='<?= $row['id']; ?>'><i class="fa fa-trash"></i></span></td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade text-left" id="upcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="title">Category Name</label>
                                                            <input type="text" class="form-control" id="upcname" name="upcname" placeholder="Enter Category Name" value="">                                                            
                                                        </div>
                                                    </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" id="upcat"  name="upcat" class="btn btn-primary">Update</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            $i++;
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

    <!-- Modal -->
    <div class="modal fade text-left" id="upcate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="title">Category Name</label>
                    <input type="text" class="form-control" id="cupname" name="cupname">
                    <input type="hidden" class="form-control" id="cupid" name="cupid">
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="upcatdata"  name="upcatdata" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
    </div>
    <?php include "footer.php"?>
    <script>
$(document).ready(function(){

     /**
     * Add category
     */

    $("#addcat").click(function(e){
        e.preventDefault();
            var cat=$("#cname").val();
            if(cat==""){
                alert("Enter category name");
            }
            else{
            $.ajax({
                type: "POST",
                url: "script.php",
                data: {
                    addcat:cat
                },
                success: function (response) {
                    if(response=="Success"){
                        window.location.href = "category.php";				
					}
					else if(response=="Failed"){
					   alert("Error occured !");
					}
                    }
            }); 
        }          
     });

          
     /**
     * Update show category
     */


    $(".update").click(function(e){
        e.preventDefault();
            var el = this;
            var upcatid= $(this).data('id');
            $.ajax({
                type: "POST",
                url: "script.php",
                data: {
                    upcat:upcatid
                },
                dataType: "json",
                success: function (data) {
                    if(data.error == '') {
                            $("#cupname").val(data.update.name);                           
                            $("#cupid").val(data.update.id);                           
                        } 
                    }
            });           
     });
            
     /**
     * Update category data
     */

    $("#upcatdata").click(function(e){
        e.preventDefault();
            var newupcatid=$("#cupid").val();
            var newcupname=$("#cupname").val();

           $.ajax({
                type: "POST",
                url: "script.php",
                data: {
                    newupcatid:newupcatid,
                    newcupname:newcupname
                },
                success: function (data) {
                    if(data == 'Success') {
                        window.location.href = "category.php";                           
                    }else{
                        alert("Something went wrong");
                    }
                } 
            });     
     });


     
     /**
     * Delete category
     */


     $(".delete").click(function(e){
        e.preventDefault();
            var el = this;
            var catid= $(this).data('id');
            $.ajax({
                type: "POST",
                url: "script.php",
                data: {
                    delcat:catid
                },
                success: function (response) {
                    if(response=="Success"){
                        window.location.href = "category.php";				
					}
					else if(response=="Failed"){
					   alert("Error occured !");
					}
                }
            });           
     });

})
</script>