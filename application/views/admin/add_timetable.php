

    <hr>
  <div class="col-md-8" >
      <?php echo $this->session->flashdata('my_msg'); ?>

           <!-- Horizontal Form -->
           <div class="card card-info">
             <div class="card-header">
               <h3 class="card-title"><center><b>Add Routine</center></h3>
             </div>
          <form class="form-horizontal" method="post" action="<?php echo base_url()?>index.php/admin/Add_timetable/save">
            <input type="hidden" name="id" value="<?php echo $time_edt_list['id'];?>">
               <div class="card-body">
                 <div class="row">
                    <div class="form-group col-md-6">
                       <label>Event Title</label>
                       <input type="text" name="event_title" value="<?php echo $time_edt_list['event_title'];?>" class="form-control col-sm-10" placeholder="Name of the event ...">
                     </div>
                     <div class="form-group col-md-6">
                           <label>Start Time</label>
                           <input type="time" name="s_time" value="<?php echo $time_edt_list['s_time'];?>" class="form-control col-sm-10" placeholder="Event start time ...">
                      </div>
                    </div>
                     <div class="row">
                      <div class="form-group col-md-6">
                         <label>Duration</label>
                         <input type="text" name="duration" value="<?php echo $time_edt_list['duration'];?>" class="form-control col-sm-10" placeholder="Add a short brief ...">
                       </div>
                       <div class="form-group col-md-6">
                          <label>Taken by</label>
                          <label for="exampleInputEmail1">Select a Tutor</label>
                          <select name="t_id"  value="<?php echo $time_edt_list['t_id'];?>" class="form-control " id="exampleInputEmail1" placeholder="Pick a Tutor">
                            <option>--SELECT--</option>
                                <?php

                                      foreach($t_list as $cat){
                                      $selected = ($cat['id']==$time_edt_list['t_id']?'selected="selected"':'');//short hand conditional optr
                                      ?>
                                      <option value="<?php echo $cat['id']; ?>" <?php echo $selected;?> ><?php echo $cat['tutor_name']; ?></option>
                                      <?php } ?>
                          </select>
                        </div>

                      </div>



               </div>
               <!-- /.card-body -->
               <div class="card-footer" style="float:right">
                 <button type="submit" name="btnSubmit" class="btn btn-info">Register As a Program!</button>
               </div>
               <!-- /.card-footer -->
          </form>
          </div>
  </div>
  <hr>

  <?php

    if(count($time_list)>0){?>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Current Programs:</h3>

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
              <th>Title</th>
              <th>Starting time</th>
              <th>Duration</th>
              <th>Taken By</th>
              <th>Edit</th>
              <th>Remove</th>
            </tr>
            <?php  //print_r($cat_list);
                   $i=1;
                   foreach($time_list as $list){?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $list['event_title']; ?></td>
              <td><?php echo $list['s_time']; ?></td>
              <td><?php echo $list['duration']; ?></td>
              <td><?php echo $list['tutor_name']; ?></td>
              <td><a href="<?php echo base_url()?>index.php/admin/Add_timetable/edit?id=<?php echo $list['id']; ?>">Edit</a></td>
              <td><a href="<?php echo base_url()?>index.php/admin/Add_timetable/delete?id=<?php echo $list['id']; ?>">Remove</a></td>
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
  <h3><center>Not Added Any Events Yet!</center></h3>
<?php } ?>
