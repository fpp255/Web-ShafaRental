		 	<div class="content-wrapper">
			    <section class="content-header">
			     	<h1>Order</h1>
		      		<ol class="breadcrumb">
		        		<li><a href="<?php echo site_url('backend/')?>"><i class="fa fa-dashboard"></i> Dashboard Admin</a></li>
		        		<li class="active"><i class="fa fa-line-chart"></i> Order</li>
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
					              		Edit Order
					              	</h3>
					            </div>
					            <div class="box-body">
					              	<div class="row">
					                	<div class="col-md-12">
					                  		<form id="form1" name="form1" action="<?php echo site_url('/backend/order/edit/'.$order->id_order.'/')?>" method="post" enctype="multipart/form-data">
												<div class="row">
		      										<div class="col-md-6">
		      											<div class="form-group">
															<label <?php if (form_error('tglorder')) {echo "style='color:#f56954'";} ?> />Tgl. Order:</label>
															<input type="text" name='tglorder' value="<?php echo set_value('tglorder',$order->tgl_order)?>" class="form-control" readonly />
														</div>
		      										</div>
		      										<div class="col-md-6">
		      											<div class="form-group">
															<label <?php if (form_error('nama')) {echo "style='color:#f56954'";} ?> />Nama Pelanggan:</label>
															<input type="text" name='nama' value="<?php echo set_value('nama',$order->nama_pelanggan)?>" class="form-control" readonly />
														</div>
		      										</div>
		      									</div>
		      									<div class="row">
		      										<div class="col-md-6">
		      											<div class="form-group">
															<label <?php if (form_error('nohp')) {echo "style='color:#f56954'";} ?> />No. HP:</label>
															<input type="text" name='nohp' value="<?php echo set_value('nohp',$order->hp_pelanggan)?>" class="form-control" readonly />
														</div>
		      										</div>
		      										<div class="col-md-6">
		      											<div class="form-group">
															<label <?php if (form_error('email')) {echo "style='color:#f56954'";} ?> />Email:</label>
															<input type="text" name='email' value="<?php echo set_value('email',$order->email_pelanggan)?>" class="form-control" readonly />
														</div>
		      										</div>
		      									</div>
		      									<div class="row">
		      										<div class="col-md-12">
		      											<div class="form-group">
															<label <?php if (form_error('jmobil')) {echo "style='color:#f56954'";} ?> />Jenis Mobil:</label>
															<select name="jmobil" class="form-control" <?php if (form_error('jmobil')) {echo "style='color:#f56954'";} ?>>
					                                            <option value="">--- Pilih Mobil ---</option>
					                                            <?php
					                                                foreach ($jmobils as $value) {
					                                                  $selected=($value->id_jmobil == $order->id_armada) ? "selected" : "";
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
															<label <?php if (form_error('tglawal')) {echo "style='color:#f56954'";} ?> />Tgl. Awal Sewa:</label>
															<input type="text" name='tglawal' value="<?php echo set_value('tglawal',$order->tgl_awalsewa)?>" class="form-control" />
														</div>
		      										</div>
		      										<div class="col-md-6">
		      											<div class="form-group">
															<label <?php if (form_error('tglakhir')) {echo "style='color:#f56954'";} ?> />Tgl. Akhir Sewa:</label>
															<input type="text" name='tglakhir' value="<?php echo set_value('tglakhir',$order->tgl_akhirsewa)?>" class="form-control" />
														</div>
		      										</div>
		      									</div>
		      									<div class="row">
		      										<div class="col-md-6">
		      											<div class="form-group">
															<label <?php if (form_error('statusord')) {echo "style='color:#f56954'";} ?> />Status Order:</label>
															<input type="text" name='statusord' value="<?php echo set_value('statusord',$order->status_order)?>" class="form-control" />
														</div>
		      										</div>
		      										<div class="col-md-6">
		      											<div class="form-group">
															<label <?php if (form_error('statusbyr')) {echo "style='color:#f56954'";} ?> />Status Bayar:</label>
															<input type="text" name='statusbyr' value="<?php echo set_value('statusbyr',$order->status_bayar)?>" class="form-control" />
														</div>
		      										</div>
		      									</div>

					                  			<div class="row">
									      			<div class="col-md-12 text-center">
									      				<a href="<?php echo site_url('/backend/order')?>" class="btn btn-danger">&nbsp;&nbsp;&nbsp;Cancel&nbsp;&nbsp;&nbsp;</a>
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
