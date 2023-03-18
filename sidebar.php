<div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text" class="form-control">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                <?php 
               $con = mysqli_connect("localhost","root","","blog") or die("Database not connected".mysqli_connect_error());
                                        
               $catsql="SELECT *FROM category ORDER BY id DESC";
               
               $catresult=mysqli_query($con,$catsql);
               while($cat=mysqli_fetch_assoc($catresult)){
                        
              ?>

                  <li><a href="#"><?= $cat['name']?><span>(<?= $cat['posts']?>)</span></a></li>
                  <?php }?>
                </ul>
              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
                <?php
              $con = mysqli_connect("localhost","root","","blog") or die("Database not connected".mysqli_connect_error());
                                        
              $postsql="SELECT *FROM post ORDER BY id DESC LIMIT 4";
              
              $postresult=mysqli_query($con,$postsql);
              while($post=mysqli_fetch_assoc($postresult)){
                        
              ?>

                <div class="post-item clearfix">
                  <img src="admin/img/upload/post/<?= $post['image']?>" alt="">
                  <h4><a href="blog-single.html"><?= $post['title']?></a></h4>
                  <time datetime="2020-01-01"><?= $post['date']?></time>
                </div>
              <?php }?>
              </div><!-- End sidebar recent posts-->

              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  <li><a href="#">App</a></li>
                  <li><a href="#">IT</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Mac</a></li>
                  <li><a href="#">Design</a></li>
                  <li><a href="#">Office</a></li>
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Studio</a></li>
                  <li><a href="#">Smart</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->
