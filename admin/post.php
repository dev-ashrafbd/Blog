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
                    <h1 class="h2 mb-4 text-gray-800">Post</h1>


                    <div class="col-sm-12 text-right mb-3">
                        <!-- Button trigger modal -->
                        <button type="button" id="profile" class="btn btn-primary" data-toggle="modal" data-target="#addpostmodal">
                        Add Post
                        </button>
                        <!-- Modal -->
                        <div class="modal fade text-left" id="addpostmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form action="script.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Description</label>
                                        <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                    <select class="custom-select" id="catname" name="catname">
                                        <?php
                                        $con = mysqli_connect("localhost","root","","blog") or die("Database not connected".mysqli_connect_error());
                                        
                                        $catsql="SELECT *FROM category";
                                        
                                        $catresult=mysqli_query($con,$catsql);
                                        while($cat=mysqli_fetch_assoc($catresult)){
                                        ?>
                                        <option value="<?= $cat['id']?>"><?= $cat['name']?></option>
                                        <?php  }?>
                                    </select>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="postimg" id="postimg">
                                        <input type="hidden" class="custom-file-input" name="author" id="author" value="<?php echo $_SESSION['id']?>">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" id="addpost"  name="addpost" class="btn btn-primary">Add</button>
                                    </div  >
                                </form>
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
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Author</th>
                                            <th>Date</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                                                           
                                                $authorrole=$_SESSION['role'];
                                                $authorID=$_SESSION['id'];
                                                if($authorrole=="0"){
                                                    $sql="SELECT *FROM post WHERE author='{$authorID}'";

                                                }else{
                                                    $sql="SELECT *FROM post";

                                                }
                                                $result=mysqli_query($con,$sql);
                                                $i=1;

                                                while($row = mysqli_fetch_assoc($result)){
                                                    
                                            
                                        ?>
                                            <tr>
                                                <td>
                                                    <?= $i?>
                                                </td>
                                                <td>
                                                    <img src="img/upload/post/<?php echo $row['image']?>" width="50%">
                                                <td>
                                                    <?php echo $row['title']?>
                                                </td>
                                                <td>
                                                    <?php 
                                                    $getcatid=$row['category'];
                                                    $getcat="SELECT *FROM category wHERE id='{$getcatid}'";
                                        
                                                    $catshow=mysqli_query($con,$getcat);
                                                    while($cat=mysqli_fetch_assoc($catshow)){
                                                        echo $cat['name'];
                                                }
                                                    ?>
                                                    <td><?= $row['description']?></td>
                                                </td>
                                                <td>
                                                    <?php 
                                                    $getuserid=$row['author'];
                                                    $useridsql="SELECT blog.register.fname,blog.register.lname,blog.register.id FROM blog.register LEFT JOIN blog.post ON blog.register.id = '{$getuserid}';";                                        
                                                    $usershow=mysqli_query($con,$useridsql);
                                                    while($user=mysqli_fetch_assoc($usershow)){
                                                        echo $user['fname']." ".$user['lname'];
                                                        break;
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['date']?>
                                                </td>

                                                <td><a href=""><i class="fa fa-edit"></i></a></td>
                                                <td><span class='delete' data-id='<?= $row['id']; ?>'><i class="fa fa-trash"></i></span></td>
                                            </tr>
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


    <?php include "footer.php"?>
    <script>
$(document).ready(function(){

    /**
     * Get Profile Image name
     */

    $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });

    /**
     * Delete Post
     */


    $(".delete").click(function(e){
        e.preventDefault();
            var el = this;
            var postid= $(this).data('id');
            $.ajax({
                type: "POST",
                url: "script.php",
                data: {
                    postid:postid
                },
                success: function (response) {
                    if(response=="Success"){
                        window.location.href = "post.php";				
					}
					else if(response=="Failed"){
					   alert("Error occured !");
					}
                }
            });           
     });
    
})
</script>