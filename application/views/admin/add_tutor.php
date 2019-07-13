

    <hr>
  <div class="col-md-8" >

           <!-- Horizontal Form -->
           <div class="card card-info">
             <div class="card-header">
               <h3 class="card-title"><center><b>Add Tutors</center></h3>
             </div>
          <form class="form-horizontal" method="post" action="<?php echo base_url()?>index.php/admin/Add_tutor/tutor_register">
               <div class="card-body">
                 <div class="row">
                    <div class="form-group col-md-6">
                       <label>Tutor Name</label>
                       <input type="text" name="tutor_name" class="form-control col-sm-10" placeholder="Name of the tutor ...">
                     </div>
                     <div class="form-group col-md-6">
                           <label>Email (This will be the username for the user)</label>
                           <input type="text" name="email" class="form-control col-sm-10" placeholder="e-mail ...">
                      </div>
                    </div>
                     <div class="row">
                      <div class="form-group col-md-6">
                         <label>Phone</label>
                         <input type="text" name="phone" class="form-control col-sm-10" placeholder="phone ...">
                       </div>
                       <div class="form-group col-md-6">
                          <label>City</label>
                          <input type="text" name="city" class="form-control col-sm-9" placeholder="city ...">
                        </div>
                      </div>
                      <div class="row">
                       <div class="form-group col-md-6">
                             <label>Password</label>
                             <input type="text" name="passwd" class="form-control col-md-10" placeholder="password ...">
                        </div>
                        <div class="form-group col-md-6">
                              <label>Confirm Password</label>
                              <input type="text" name="passwd" class="form-control col-md-10" placeholder="confirm it ...">
                         </div>
                       </div>


               </div>
               <!-- /.card-body -->
               <div class="card-footer" style="float:right">
                 <button type="submit" name="btnSubmit" class="btn btn-info">Register Him As a Tuter!</button>
               </div>
               <!-- /.card-footer -->
          </form>
          </div>
  </div>
  <hr>

  <?php

    if(count($tutors_list)>0){?>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Current Tutors:</h3>

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
              <th>Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th>City</th>
              <th>Num of Videos Uploaded</th>
              <th>Remove</th>
            </tr>
            <?php  //print_r($cat_list);
                   $i=1;
                   foreach($tutors_list as $list){?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $list['tutor_name']; ?></td>
              <td><?php echo $list['phone']; ?></td>
              <td><?php echo $list['email']; ?></td>
              <td><?php echo $list['city']; ?></td>
              <td><?php echo $list['number_of_videos']; ?></td>
              <td><a href="<?php echo base_url()?>index.php/admin/Add_tutor/delete?id=<?php echo $list['id']; ?>">Remove</a></td>
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
  <h3><center>Not Added Any Tutors Yet!</center></h3>
<?php } ?>
