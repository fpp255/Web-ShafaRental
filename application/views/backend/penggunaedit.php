		 	<div class="content-wrapper">
			    <section class="content-header">
			     	<h1>Pengguna</h1>
		      		<ol class="breadcrumb">
		        		<li><a href="<?php echo site_url('backend/')?>"><i class="fa fa-dashboard"></i> Dashboard Admin</a></li>
		        		<li class="active"><i class="fa fa-users"></i> Pengguna</li>
		      		</ol>
		   		</section>
		    	
		    	<section class="content">
		      		<div class="row">
		      			<div class="col-md-12">
		      				<?php if ($this->session->flashdata('pesanerror')) { ?>
								<script language="javascript" type="text/javascript">
									window.onload = function(){
										swal({
											title: "Failed!",
											text: "<?php echo $this->session->flashdata('pesanerror');?>",
											type: "error",
											confirmButtonText: "Close"
										});
									}
								</script>
							<?php } else if ($this->session->flashdata('noaccess')) { ?>	
								<script language="javascript" type="text/javascript">
									window.onload = function(){
										swal({
											title: "Forbidden!",
											text: "You don't have permission to access!",
											type: "error",
											confirmButtonText: "Close"
										});
									}
								</script>	
							<?php } else if ($this->session->flashdata('pesansukses')) { ?>	
								<script language="javascript" type="text/javascript">
									window.onload = function(){
										swal({
											title: "Success",
											text: "<?php echo $this->session->flashdata('pesansukses');?>",
											type: "success",
											confirmButtonText: "Close"
										});
									}
								</script>	
							<?php } else { ?>	
								&nbsp;
							<?php } ?>	
			      			<div class="box box-info">
					            <div class="box-header with-border">
					              	<h3 class="box-title">
					              		Edit Pengguna
					              	</h3>
					            </div>
					            <div class="box-body">
					              	<div class="row">
					                	<div class="col-md-12">
					                  		<form id="form1" name="form1" action="<?php echo site_url('/backend/pengguna/edit/'.$pengguna->id)?>" method="post" enctype="multipart/form-data">
					                  			<div class="row">
		      										<div class="col-md-6">
		      											<div class="form-group">
															<label <?php if (form_error('jmobil')) {echo "style='color:#f56954'";} ?> />Nama Depan:</label>

															<input type="text" name='first_name' value="<?php echo set_value('first_name',$pengguna->first_name)?>" class="form-control" <?php if (form_error('first_name')) {echo "style='border-color:#f56954'";} ?> />
														</div>
		      										</div>
		      										<div class="col-md-6">
		      											<div class="form-group">
															<label <?php if (form_error('last_name')) {echo "style='color:#f56954'";} ?> />Nama Belakang:</label>
															<input type="text" name='last_name' value="<?php echo set_value('last_name',$pengguna->last_name)?>" class="form-control" <?php if (form_error('last_name')) {echo "style='border-color:#f56954'";} ?> />
														</div>
		      										</div>
		      									</div>
												<div class="row">
		      										<div class="col-md-6">
		      											<div class="form-group">
															<label <?php if (form_error('phone')) {echo "style='color:#f56954'";} ?> />Phone:</label>
															<input type="text" name='phone' value="<?php echo set_value('phone',$pengguna->phone)?>" class="form-control" <?php if (form_error('phone')) {echo "style='border-color:#f56954'";} ?> />
														</div>
		      										</div>
		      										<div class="col-md-6">
		      											<div class="form-group">
															<label <?php if (form_error('password')) {echo "style='color:#f56954'";} ?> />Password:</label>
															<input type="password" name='password' value="<?php echo set_value('password')?>" class="form-control" <?php if (form_error('password')) {echo "style='border-color:#f56954'";} ?> />
														</div>
		      										</div>
		      									</div>
		      									<div class="row">
		      										<div class="col-md-6">
		      											<div class="form-group">
															<label <?php if (form_error('groupuser')) {echo "style='color:#f56954'";} ?> />Group:</label>
															
															<select name="groupuser" class="form-control" <?php if (form_error('groupuser')) {echo "style='border-color:#f56954'";} ?> />
					                                            <option value="">--- Pilih Group ---</option>
					                                            <?php
					                                            	foreach ($groups as $value) {
									                                      $selected=($value->id == $grouppengguna->group_id) ? "selected" : "";
									                                      echo "<option value='$value->id' $selected>$value->name</option>";
									                                }
					                                            ?>
					                                        </select>
														</div>
		      										</div>
		      										<div class="col-md-6">
		      											<div class="form-group">
															<label <?php if (form_error('statususer')) {echo "style='color:#f56954'";} ?> />Status:</label>
															
															<select name="statususer" class="form-control" <?php if (form_error('statususer')) {echo "style='border-color:#f56954'";} ?> />
					                                            <option value="">--- Pilih Status ---</option>
					                                            <?php
					                                            	$pilihanstatus=array("1","0");
                          											foreach ($pilihanstatus as $value) {
											                            $selected=($value == $pengguna->active) ? "selected" : "";
											                            if ($value==1) {
											                               echo "<option value='$value' $selected>Aktif</option>";
											                            } else {
											                               echo "<option value='$value' $selected>Tidak Aktif</option>";
											                            }
                           
                          											}
					                                            ?>
					                                        </select>
														</div>
		      										</div>
		      									</div>
		      									<div class="row">
									      			<div class="col-md-12 text-center">
									      				<a href="<?php echo site_url('/backend/pengguna')?>" class="btn btn-danger">&nbsp;&nbsp;&nbsp;Cancel&nbsp;&nbsp;&nbsp;</a>
									      				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

									      				<input type="submit" name="submit" class="btn btn-primary" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
									      			</div>
									      		</div>
					                  		</form>
								        </div>
								    </div>
					            </div>
					        </div>
			      		</div>
		      		</div>
		    	</section>
		  	</div>
