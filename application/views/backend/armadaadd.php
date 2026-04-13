		 	<div class="content-wrapper">
			    <section class="content-header">
			     	<h1>Armada</h1>
		      		<ol class="breadcrumb">
		        		<li><a href="<?php echo site_url('backend/')?>"><i class="fa fa-dashboard"></i> Dashboard Admin</a></li>
		        		<li class="active"><i class="fa fa-bus"></i> Armada</li>
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
					              		Tambah Armada
					              	</h3>
					            </div>
					            <div class="box-body">
					              	<div class="row">
					                	<div class="col-md-12">
					                  		<form id="form1" name="form1" action="<?php echo site_url('/backend/armada/add')?>" method="post" enctype="multipart/form-data">
					                  			<div class="row">
		      										<div class="col-md-12">
		      											<div class="form-group">
															<label <?php if (form_error('jmobil')) {echo "style='color:#f56954'";} ?> />Nama Armada:</label>

															<select name="jmobil" class="form-control" <?php if (form_error('jmobil')) {echo "style='border-color:#f56954'";} ?> />
				                                                <option value="">--- Pilih Mobil ---</option>
				                                                <?php foreach ($jmobils as $row) { ?>
				                                                    <option value="<?php echo $row->id_jmobil; ?> <?php echo set_select('jmobil', $row->id_jmobil)?>" /><?php echo $row->nama_jmobil; ?></option>
				                                                <?php } ?>
				                                            </select>
														</div>
		      										</div>
		      									</div>
												<div class="row">
		      										<div class="col-md-6">
		      											<div class="form-group">
															<label <?php if (form_error('hargadalam')) {echo "style='color:#f56954'";} ?> />Harga Dalam Kota:</label>
															<input type="text" name='hargadalam' value="<?php echo set_value('hargadalam')?>" class="form-control" <?php if (form_error('hargadalam')) {echo "style='border-color:#f56954'";} ?> placeholder="1000000" />
														</div>
		      										</div>
		      										<div class="col-md-6">
		      											<div class="form-group">
															<label <?php if (form_error('hargaluar')) {echo "style='color:#f56954'";} ?> />Harga Luar Kota:</label>
															<input type="text" name='hargaluar' value="<?php echo set_value('hargaluar')?>" class="form-control" <?php if (form_error('hargaluar')) {echo "style='border-color:#f56954'";} ?> placeholder="1000000" />
														</div>
		      										</div>
		      									</div>

		      									<div class="row">
		      										<div class="col-md-6">
		      											<div class="form-group">
															<label <?php if (form_error('durasi')) {echo "style='color:#f56954'";} ?> />Durasi Sewa:</label>
															<input type="text" name='durasi' value="<?php echo set_value('durasi')?>" class="form-control" <?php if (form_error('durasi')) {echo "style='border-color:#f56954'";} ?> placeholder="12 Jam" />
														</div>
		      										</div>
		      										<div class="col-md-6">
		      											<div class="form-group">
															<label <?php if (form_error('status')) {echo "style='color:#f56954'";} ?> />Status Tayang:</label>
															
															<select name="status" class="form-control" <?php if (form_error('status')) {echo "style='border-color:#f56954'";} ?> />
																<option value="">--- Pilih Status ---</option>
					                                            <?php 
					                                                $pilihanstatus=array("Tayang","Tidak Tayang");
					                                                foreach ($pilihanstatus as $value) { 
					                                            ?>
					                                                <option value='<?php echo $value; ?>' <?php echo set_select('status', $value);?> ><?php echo $value; ?></option>
					                                            <?php } ?>
					                                        </select>
														</div>
		      										</div>
		      									</div>
		      									<div class="row">
		      										<div class="col-md-6">
		      											<div class="form-group">
															<label <?php if (form_error('filegmbr')) {echo "style='color:#f56954'";} ?> />Foto/Gambar Armada (Rekomendasi pxl: 680x348 pixel):</label>
															<input name='filegmbr' type="file" class="form-control <?php if (form_error('filegmbr')) {echo "style='border-color:#f56954'";} ?>" />
														</div>
		      										</div>
		      										<div class="col-md-6">
		      											<div class="form-group">
															<label <?php if (form_error('filebg')) {echo "style='color:#f56954'";} ?> />Background Armada (Rekomendasi pxl: 600x400 pixel):</label>
															<input name='filebg' type="file" class="form-control <?php if (form_error('filebg')) {echo "style='border-color:#f56954'";} ?>" />
														</div>
		      										</div>
		      									</div>
		      									
		      									<div class="row">
									      			<div class="col-md-12 text-center">
									      				<a href="<?php echo site_url('/backend/armada')?>" class="btn btn-danger">&nbsp;&nbsp;&nbsp;Cancel&nbsp;&nbsp;&nbsp;</a>
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
