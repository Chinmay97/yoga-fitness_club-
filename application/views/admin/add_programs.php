

    <hr>
  <div class="col-md-8" >

           <!-- Horizontal Form -->
           <div class="card card-info">
             <div class="card-header">
               <h3 class="card-title"><center><b>Add Programs</center></h3>
             </div>
          <form class="form-horizontal" method="post" action="<?php echo base_url()?>index.php/admin/Add_programs/save">
               <div class="card-body">
                 <div class="row">
                    <div class="form-group col-md-6">
                       <label>Program Title</label>
                       <input type="text" name="prgm_title" class="form-control col-sm-10" placeholder="Name of the program ...">
                     </div>
                     <div class="form-group col-md-6">
                           <label>Program Fee</label>
                           <input type="text" name="prgm_fee" class="form-control col-sm-10" placeholder="Program fee for a month ...">
                      </div>
                    </div>
                     <div class="row">
                      <div class="form-group col-md-6">
                         <label>Brief</label>
                         <input type="text" name="prgm_brief" class="form-control col-sm-10" placeholder="Add a short brief ...">
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

    if(count($prgm_list)>0){?>
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
              <th>Name</th>
              <th>Cost</th>
              <th>Brief</th>
              <th>Remove</th>
            </tr>
            <?php  //print_r($cat_list);
                   $i=1;
                   foreach($prgm_list as $list){?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $list['prgm_title']; ?></td>
              <td><?php echo $list['prgm_fee']; ?></td>
              <td><?php echo $list['prgm_brief']; ?></td>

              <td><a href="<?php echo base_url()?>index.php/admin/Add_programs/delete?id=<?php echo $list['id']; ?>">Remove</a></td>
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
  <h3><center>Not Added Any Programs Yet!</center></h3>
<?php } ?>
