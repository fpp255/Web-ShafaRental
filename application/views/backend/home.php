		 	<div class="content-wrapper">
			    <section class="content-header">
			     	<h1>Dashboard</h1>
		      		<ol class="breadcrumb">
		        		<li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
		      		</ol>
		   		</section>
		    	
		   		<section class="content">
		   			<?php if ($this->session->flashdata('pesanerror')) { ?>
						<script language="javascript" type="text/javascript">
							window.onload = function(){
								swal({
									title: "Gagal!",
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
									title: "Terlarang!",
									text: "Kamu Tidak Mempunyai Akses Kehalaman Ini!",
									type: "error",
									confirmButtonText: "Close"
								});
							}
						</script>	
					<?php } else if ($this->session->flashdata('pesansukses')) { ?>	
						<script language="javascript" type="text/javascript">
							window.onload = function(){
								swal({
									title: "Sukses",
									text: "<?php echo $this->session->flashdata('pesansukses');?>",
									type: "success",
									confirmButtonText: "Close"
								});
							}
						</script>	
					<?php } else { ?>	
						&nbsp;
					<?php } ?>	

      				<div class="row">
				        <div class="col-lg-3 col-xs-6">
				          	<div class="small-box bg-primary">
				            	<div class="inner">
				            		<?php
		                              	$this->db->select('id_order');
		                              	$this->db->from('order'); 
		                              	$query = $this->db->get();
		                              	$totorder = $query->num_rows();
		                            ?>
				              		<h3><?php echo $totorder;?></h3>
				              		<p>Orders</p>
				            	</div>
				            	<div class="icon">
				              		<i class="fa fa-line-chart"></i>
				            	</div>
				            	<a href="<?php echo site_url('backend/order')?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
				          	</div>
				        </div>
				        <div class="col-lg-3 col-xs-6">
					        <div class="small-box bg-green">
				            	<div class="inner">
				              		<?php
		                              	$this->db->select('id_jmobil');
		                              	$this->db->from('jenis_mobil'); 
		                              	$query = $this->db->get();
		                              	$totjmobil = $query->num_rows();
		                            ?>
				              		<h3><?php echo $totjmobil;?></h3>
				              		<p>Jenis Mobil</p>
				            	</div>
				            	<div class="icon">
					            	<i class="fa fa-car"></i>
				            	</div>
				            	<a href="<?php echo site_url('backend/jmobil')?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
				          	</div>
				        </div>
				        <div class="col-lg-3 col-xs-6">
				          	<div class="small-box bg-yellow">
				            	<div class="inner">
				              		<?php
		                              	$this->db->select('id_armada');
		                              	$this->db->from('armada'); 
		                              	$query = $this->db->get();
		                              	$totarmada = $query->num_rows();
		                            ?>
				              		<h3><?php echo $totarmada;?></h3>
				              		<p>Armada</p>
				            	</div>
				            	<div class="icon">
				              		<i class="fa fa-bus"></i>
				            	</div>
				            	<a href="<?php echo site_url('backend/armada')?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
				          	</div>
				        </div>
				        <div class="col-lg-3 col-xs-6">
				          	<div class="small-box bg-aqua">
				            	<div class="inner">
				              		<?php
		                              	$this->db->select('id_pesan');
		                              	$this->db->from('pesan'); 
		                              	$query = $this->db->get();
		                              	$totpesan = $query->num_rows();
		                            ?>
				              		<h3><?php echo $totpesan;?></h3>
				              		<p>Pesan</p>
				            	</div>
				            	<div class="icon">
				              		<i class="fa fa-envelope"></i>
				            	</div>
				            	<a href="<?php echo site_url('backend/pesan')?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
				          	</div>
				        </div>
				    </div>

				    <!-- <div class="row">
				        <section class="col-lg-12 connectedSortable">
				        	<div class="nav-tabs-custom">
					            <ul class="nav nav-tabs pull-right">
					              	<li class="pull-left header">Diagram Order</li>
					            </ul>
					            <div class="tab-content no-padding">
					              <div class="chart" id="line-chart" style="height: 300px;"></div>
					            </div>
					          </div>
				        </section>
				    </div> -->
      			</section>
		  	</div>
