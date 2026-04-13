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
					              		Edit Armada
					              	</h3>
					            </div>
					            <div class="box-body">
					              	<div class="row">
					                	<div class="col-md-12">
					                  		<form id="form1" name="form1" action="<?php echo site_url('/backend/armada/edit/'.$armada->id_armada)?>" method="post" enctype="multipart/form-data">
					                  			<div class="row">
		      										<div class="col-md-12">
		      											<div class="form-group">
															<label <?php if (form_error('jmobil')) {echo "style='color:#f56954'";} ?> />Nama Armada:</label>

															<select name="jmobil" class="form-control" <?php if (form_error('jmobil')) {echo "style='border-color:#f56954'";} ?> />
				                                                <option value="">--- Pilih Mobil ---</option>
				                                                <?php
				                                                    foreach ($jmobils as $value) {
				                                                      $selected=($value->id_jmobil == $armada->id_jmobil) ? "selected" : "";
				                                                      echo " <option value='$value->id_jmobil' $selected>$value->nama_jmobil</option>";
				                                                    }
				                                                ?>
				                                            </select>
														</div>
		      										</div>
		      									</div>
												<div class="row">
		      										<div class="col-md-6">
		      											<div class="form-group">
															<label <?php if (form_error('hargadalam')) {echo "style='color:#f56954'";} ?> />Harga Dalam Kota:</label>
															<input type="text" name='hargadalam' value="<?php echo set_value('hargadalam',$armada->hrg_dlmkota)?>" class="form-control" <?php if (form_error('hargadalam')) {echo "style='border-color:#f56954'";} ?> />
														</div>
		      										</div>
		      										<div class="col-md-6">
		      											<div class="form-group">
															<label <?php if (form_error('hargaluar')) {echo "style='color:#f56954'";} ?> />Harga Luar Kota:</label>
															<input type="text" name='hargaluar' value="<?php echo set_value('hargaluar',$armada->hrg_luarkota)?>" class="form-control" <?php if (form_error('hargaluar')) {echo "style='border-color:#f56954'";} ?> />
														</div>
		      										</div>
		      									</div>

		      									<div class="row">
		      										<div class="col-md-6">
		      											<div class="form-group">
															<label <?php if (form_error('durasi')) {echo "style='color:#f56954'";} ?> />Durasi Sewa:</label>
															<input type="text" name='durasi' value="<?php echo set_value('durasi',$armada->durasi_sewa)?>" class="form-control" <?php if (form_error('durasi')) {echo "style='border-color:#f56954'";} ?> />
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
					                                                    $selected=($value == $armada->status_tayang) ? "selected" : "";
					                                                    echo "<option value='$value' $selected>$value</option>";
					                                                }
					                                            ?>
					                                        </select>
														</div>
		      										</div>
		      									</div>
		      									<div class="row">
		      										<div class="col-md-6">
		      											<div class="form-group">
															<label <?php if (form_error('gambar')) {echo "style='color:#f56954'";} ?> />Foto/Gambar Armada (Rekomendasi pxl: 680x348 pixel):</label>
															<input type="file" name="filegmbr">
															<?php if (!$armada->gambar1) { ?>
																<img src="" id="tampilkangambar" width="50%" />
															<?php } else { ?>
																<img src="<?php echo base_url().'uploads/'.$armada->gambar1; ?>" id="tampilkangambar" width="50%" />
															<?php } ?>
														</div>
		      										</div>
		      										<div class="col-md-6">
		      											<div class="form-group">
															<label <?php if (form_error('ltrbelakang')) {echo "style='color:#f56954'";} ?> />Background Armada (Rekomendasi pxl: 600x400 pixel):</label>
															<input type="file" name="filebg">
															<?php if ($armada->gambar2) { ?>
																<img src="<?php echo base_url().'uploads/'.$armada->gambar2; ?>" id="tampilkangambar" width="50%" />
															<?php } ?>
														</div>
		      										</div>
		      									</div>
		      									
		      									<div class="row">
									      			<div class="col-md-12 text-center">
									      				<a href="<?php echo site_url('/backend/armada')?>" class="btn btn-danger">&nbsp;&nbsp;&nbsp;Cancel&nbsp;&nbsp;&nbsp;</a>
									      				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

									      				<input type="hidden" name="filegmbrlama" value="<?php echo $armada->gambar1; ?>">
                        								<input type="hidden" name="filebglama" value="<?php echo $armada->gambar2; ?>">

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
