<section class="content">
  <div class="container-fluid">
    <hr>
    <?php echo $this->session->flashdata('my_msg'); ?>
    <div class="row">
      <!-- left column -->
      <div class="col-md-5">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Add Artcile Category</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start  -->

            <form role="form" method="post" id="cat_form" action="" >
           <input type="hidden" name="id" value="<?php //echo cat_edt_list['id']; ?>">
            <input type="hidden" name="process" value="ADD_CAT"/>

           <div class="card-body">
               <div class="row">

                 <div class="form-group col-md-11">
                   <label for="exampleInputEmail1">Category</label>
                   <input type="text"  name="category" id="category" value="<?php //echo cat_edt_list['category'];?>" class="form-control" data-message="U have missed to fill the Name Field..!!" placeholder="Add a title">
                 </div>
               </div>

           </div>



           <!-- /.card-body -->
           <div class="card-footer" style="float:right">
             <button  id="btnSubmitcat" class="btn btn-block btn-primary btn-lg">Submit</button>
           </div>
         </form>



          </div>
        <!-- /.card -->
      </div>
        <div class="col-md-7">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Your Article Category List</h3>
            </div>
            <div class="card-body">
              <?php  if(count($cat_list)>0){
                  $i=0;
                ?>

                <div class="row">
                  <?php
                        foreach($cat_list as $CatRow){
                    ?>
                        <div class="col-md-4">
                          <ul>
                              <li>
                                  <?php echo $CatRow['category']; ?><a href="<?php echo base_url()?>index.php/admin/Add_articles/delCat?id=<?php echo $CatRow['id']; ?>">(del)</a>
                              </li>
                          </ul>
                        </div>
                    <?php  }?>

                </div>

              <?php }else{?>
                <h2>You Have Currently Empty Category List!</h2>
              <?php } ?>
            </div>
          </div>
        </div>
        </div>
      <!--/.col (left) -->
      <!--/.col (right) -->
    </div>
    <div class="row">
      <!-- left column -->
      <div class="col-md-10">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Add Articles</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start  -->

            <form role="form" method="post" action=" <?php echo base_url()?>index.php/admin/Add_articles/save " >
           <input type="hidden" name="id" value="<?php echo $art_edt_list['id']; ?>">

           <div class="card-body">
               <div class="row">
                 <div class="form-group col-md-5">
                   <label for="exampleInputEmail1">Select a Category</label>
                   <select name="cat_id" id="cat_select" value="<?php echo $art_edt_list['cat_id'];?>" class="form-control " id="exampleInputEmail1" placeholder="Pick a Category">
                     <option>--SELECT--</option>
                         <?php

                               foreach($cat_list as $cat){
                               $selected = ($cat['id']==$art_edt_list['cat_id']?'selected="selected"':'');//short hand conditional optr
                               ?>
                               <option value="<?php echo $cat['id']; ?>" <?php echo $selected;?> ><?php echo $cat['category']; ?></option>
                               <?php } ?>
                   </select>
                 </div>
                 <div class="form-group col-md-7">
                   <label for="exampleInputEmail1">Title</label>
                   <input type="text" name="title" value="<?php echo $art_edt_list['title'];?>" class="form-control" id="" placeholder="Add a title">
                 </div>
               </div>
               <div class="form-group">
                 <label for="exampleInputPassword1">Brief</label>
                 <textarea name="brief" class="form-control" id="" placeholder="add just 2 line about it...before u go detail"><?php echo $art_edt_list['description'];?></textarea>
               </div>
                 <div class="form-group">
                   <label for="exampleInputPassword1">In Details</label>
                   <textarea name="description" class="form-control ckeditor" id="" placeholder="Description..."><?php echo $art_edt_list['description'];?></textarea>
                 </div>

           </div>



           <!-- /.card-body -->
           <div class="card-footer" style="float:right">
             <button type="submit" name="btnSubmit" class="btn btn-block btn-primary btn-lg">Submit</button>
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
    <?php  if(count($art_list)>0){?>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Your Articles</h3>


            </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
                <div>
                  <table class="table table-hover">
                    <tr>
                      <th>Sl.Nm</th>
                      <th>Category Name</th>
                      <th>Title</th>
                      <th>Brief</th>
                      <th>Date Mod.</th>
                      <th>Edit</th>
                      <th>Delete</th>
                      <th>Description</th>

                    </tr>
                    <?php  //print_r($vid_list);
                    $i=1;
                    //`cat_id`, `title`, `description`, `video`, `prefered`, `v_length`, `date`, `tutor_id`SELECT * FROM `tbl_videos` WHERE 1
                    foreach($art_list as $art){?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $art['category']; ?></td>
                        <td><?php echo $art['title']; ?></td>
                        <td><?php echo $art['brief']; ?></td>
                        <td><?php echo $art['date']; ?></td>
                        <td><a href="<?php echo base_url()?>index.php/admin/Add_articles/edit?id=<?php echo $art['id']; ?>">Edit</a></td>
                        <td><a href="<?php echo base_url()?>index.php/admin/Add_articles/deleteArt?id=<?php echo $art['id']; ?>">Delete</a></td>
                        <td><?php echo html_entity_decode($art['description'],ENT_QUOTES); ?></td>
                      </tr>

                      <?php  $i++; } ?>
                    </table>
                  </div>
                </div>
          </div>
            <!-- /.card-body -->

          <!-- /.card -->
        </div>
      </div><!-- /.row -->
    <?php }else{?>
      <h3><center>No Records Added Yet!</center></h3>
    <?php } ?>
  </div><!-- /.container-fluid -->
</section>
<hr>
