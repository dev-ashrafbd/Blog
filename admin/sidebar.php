
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Blog <sup>2020</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Post
</div>

<!-- Nav Item - Post Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="post.php">
        <i class="fas fa-check"></i>
        <span>Post</span></a>
</li

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Category
</div>

<!-- Nav Item - Category Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="category.php">
        <i class="fas fa-tasks"></i>
        <span>Category</span></a>
</li

<!-- Divider -->
<hr class="sidebar-divider">
<?php if($_SESSION['role']==1){?>
<!-- Heading -->
<div class="sidebar-heading">
    User
</div>

<!-- Nav Item - Users Collapse Menu -->
            
<li class="nav-item">
    <a class="nav-link" href="user.php">
        <i class="fas fa-user"></i>
        <span>Users</span></a>
</li

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">
<?php } ?>
             <!-- Footer -->
             <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center text-white my-auto">
                        <span>&copy; Blog  2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>


</ul>
<!-- End of Sidebar -->