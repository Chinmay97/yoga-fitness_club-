<section class="content">
  <div class="container-fluid">
    <hr>
    <?php echo $this->session->flashdata('my_msg'); ?>
    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">

            <h3 class="card-title">Add Section Category</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->

          <form role="form" method="post" action="<?php echo base_url()?>index.php/admin/Typesof_yoga/addCat">
            <input type="hidden" name="id" value="<?php echo $cat_edt_list['id']; ?>">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label>
                <input type="name" name="cat_name" value="<?php echo $cat_edt_list['cat_name'];?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Category">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <textarea name="cat_desc" class="form-control" id="exampleInputPassword1" placeholder="Description..."><?php echo $cat_edt_list['cat_desc'];?></textarea>
              </div>

              <div class="row form-group ">
                <div class="col-md-6">
                  <label for="exampleInputEmail1">Add Tags (Benifits for)</label>
                  <input type="name" name="benifits" value="<?php echo $cat_edt_list['benifits'];?>" class="form-control" id="exampleInputEmail1" placeholder="Enter here">
                </div>

              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->




      </div>
      <!--/.col (left) -->

      <!--/.col (right) -->
    </div>
    <!-- /.row -->
    <hr>
    <?php  if(count($cat_list)>0){?>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Sections Already Added</h3>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
          <!--      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
-->
                <div class="input-group-append">
                <!--  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              -->  </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover">
              <tr>
                <th>Sl.Num</th>
                <th>Category Name</th>
                <th>Category Description</th>
                <th>Benifits</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
              <?php  //print_r($cat_list);
                     $i=1;
                     foreach($cat_list as $cats){?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $cats['cat_name']; ?></td>
                <td><?php echo $cats['cat_desc']; ?></td>
                <td><?php echo $cats['benifits']; ?></td>
                <td><a href="<?php echo base_url()?>index.php/admin/Typesof_yoga/edit?id=<?php echo $cats['id']; ?>">Edit</a></td>
                <td><a href="<?php echo base_url()?>index.php/admin/Typesof_yoga/delete?id=<?php echo $cats['id']; ?>">Delete</a></td>
              </tr>

                <?php $i++; } ?>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div><!-- /.row -->
  <?php }else{?>
    <h3><center>No Records Added Yet!</center></h3>
  <?php } ?>
  </div><!-- /.container-fluid -->
</section>
<hr>
