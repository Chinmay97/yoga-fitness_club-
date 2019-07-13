<section class="content">
  <div class="container-fluid">
    <hr>
    <?php echo $this->session->flashdata('my_msg'); ?>
    <div class="row">
      <!-- left column -->
      <div class="col-md-10">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Add Videos</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start  -->
          <?php echo form_open_multipart(base_url().'index.php/admin/Add_videos/addVid');?>

           <input type="hidden" name="id" value="<?php echo $vid_edt_list['id']; ?>">
           <input type="hidden" name="video" value="<?php echo $vid_edt_list['video']; ?>">
           <div class="card-body">
           <div class="row">
             <div class="form-group col-md-5">
               <label for="exampleInputEmail1">Select a Category</label>
               <select name="cat_id" value="<?php echo $vid_edt_list['cat_id'];?>" class="form-control " id="exampleInputEmail1" placeholder="Pick a Category">
                 <option>--SELECT--</option>
                     <?php

                           foreach($cat_list as $cat){
                           $selected = ($cat['id']==$vid_edt_list['cat_id']?'selected="selected"':'');//short hand conditional optr
                           ?>
                           <option value="<?php echo $cat['id']; ?>" <?php echo $selected;?> ><?php echo $cat['cat_name']; ?></option>
                           <?php } ?>
               </select>
             </div>
             <div class="form-group col-md-7">
               <label for="exampleInputEmail1">Title</label>
               <input type="text" name="title" value="<?php echo $vid_edt_list['title'];?>" class="form-control" id="" placeholder="Add a title">
             </div>
           </div>
             <div class="form-group">
               <label for="exampleInputPassword1">Description</label>
               <textarea name="description" class="form-control" id="" placeholder="Description..."><?php echo $vid_edt_list['description'];?></textarea>
             </div>


           <div class="row">
                 <div class="form-group col-md-4">
                       <label for="my_file">Select Video File</label>
                       <div class="input-group">
                         <div class="custom-file">
                          
                            <input type="file" name="userfile" id="userfile" class=""/>

                         </div>
                       </div>
                 </div>
                 <div class="form-group col-md-2">
                   <label for="exampleInputEmail1"> Video Length</label>
                   <input type="text" name="v_length" value="<?php echo $vid_edt_list['v_length'];?>" class="form-control " id="exampleInputEmail1" placeholder="length"/>
                 </div>
                 <div class="form-group col-md-6">
                     <label for="exampleInputEmail1">Prefered for</label>
                     <textarea name="prefered" class="form-control" id="exampleInputEmail1" placeholder="Enter here"><?php  echo $vid_edt_list['prefered'];?></textarea>

                 </div>
             </div>


           </div>
           </div>
           <!-- /.card-body -->
           <div class="card-footer" style="float:right">
             <button type="submit" id="btnVid" name="btnSubmit" class="btn btn-block btn-primary btn-lg">Submit</button>
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
    <?php  if(count($vid_list)>0){?>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Your Videos</h3>

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
                <th>Sl.Nm</th>
                <th>Category Name</th>
                <th>Title</th>
                <th>Description</th>
                <th>Video</th>
                <th>Prefered for</th>
                <th>Length</th>
                <th>Date Modified</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
              <?php  //print_r($vid_list);
                     $i=1;
  //`cat_id`, `title`, `description`, `video`, `prefered`, `v_length`, `date`, `tutor_id`SELECT * FROM `tbl_videos` WHERE 1
                     foreach($vid_list as $vid){?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $vid['cat_name']; ?></td>
                <td><?php echo $vid['title']; ?></td>
                <td><?php echo $vid['description']; ?></td>
                <td><video   width="150" height="100" poster="<?php echo base_url() ?>/uploads/videos/<?php echo $vid['video']; ?>" controls>
                   <source src="<?php echo base_url() ?>/upload/<?php echo $vid['video']; ?>" type="video/mp4" >


                </video></td>


                <td><?php echo $vid['prefered']; ?></td>
                <td><?php echo $vid['v_length']; ?></td>
                <td><?php echo $vid['date']; ?></td>

                <td><a href="<?php echo base_url()?>index.php/admin/Add_videos/edit?id=<?php echo $vid['id']; ?>">Edit</a></td>
                <td><a href="<?php echo base_url()?>index.php/admin/Add_videos/delete?id=<?php echo $vid['id']; ?>">Delete</a></td>
              </tr>

                <?php  $i++; } ?>
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
