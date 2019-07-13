

    <div class="colorlib-classes">
			<div class="container">
				<div class="row">
          <form method="post" action="<?php echo base_url()?>index.php/web/Mbr_profile/updateMbr" >
					<div class="col-md-4">

						<div class="side animate-box">
							<h3>Hello, <?php echo $_SESSION['user_name']; ?></h3>
							<div class="trainers-entry">
								<div class="trainer-img" style="background-image: url(<?php echo base_url() ?>assets/images/customer-512.png)"></div>

                <div class="desc">

								<span>Member</span>
								</div>
							</div>
              <div class="row">
                <div class="col-sm-6">
                    <h4>Set display pic</h4>
                </div>
                <div class="col-sm-6">
                    <input type="file" class="form-control" name="image_file">
                </div>


            </div>
						</div>
					</div>
          <div class="col-md-8 animate-box">

            <div class="classes-desc">
              <div class="row row-pb-lg">
                <div class="col-md-12">
                  <h3>Features</h3>
                </div>
                <div class="col-md-6">
                  <ul>
                    <li><i class="icon-check"></i> Physical Attractiveness</li>
                    <li><i class="icon-check"></i> Rehabilation</li>
                    <li><i class="icon-check"></i> General Physical Health</li>
                    <li><i class="icon-check"></i> Physical Attractiveness</li>
                  </ul>
                </div>
                <div class="col-md-6">
                  <ul>
                    <li><i class="icon-check"></i> Sport Performance</li>
                    <li><i class="icon-check"></i> Healthy Lifestyle</li>
                    <li><i class="icon-check"></i> Pleasure Activity</li>
                    <li><i class="icon-check"></i> Health Program</li>
                  </ul>
                </div>
                <div class="col-md-12">
                  <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                </div>
              </div>
            </div>
          </div>
        </form>
				</div>
			</div>
    </div>
