		 	<div class="content-wrapper">
			    <section class="content-header">
			     	<h1>Order</h1>
		      		<ol class="breadcrumb">
		        		<li class="active"><i class="fa fa-line-chart"></i> Order</li>
		      		</ol>
		   			</section>
		    	
		    	<section class="content">
		      		<div class="box">
		        		<div class="box-header with-border">
		          			<h3 class="box-title">List Order</h3>
		        		</div>
		        		
		        		<div class="box-body">
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

		          			<table id="tabelorder" class="table table-bordered table-hover">
				                <thead>
					                <tr>
						                <th>Tgl. Order</th>
						                <th>Nama Pelanggan</th>
						                <th>No. HP</th>
						                <th>Email</th>
						                <th>Jenis Mobil</th>
						                <th>Tgl. Awal Sewa</th>
						                <th>Tgl. Akhir Sewa</th>
						                <th>Status Order</th>
						                <th>Status Bayar</th>
						                <th>Action</th>
					                </tr>
				                </thead>
				                <tbody>
				                	<?php foreach ($orders as $row) { ?>
				                		<tr>
						                  	<td><?php echo $this->fppfunction->tglangkajam_ind($row->tgl_order); ?></td>
						                  	<td><?php echo $row->nama_pelanggan ?></td>
						                  	<td><?php echo $row->hp_pelanggan ?></td>
						                  	<td><?php echo $row->email_pelanggan ?></td>
						                  	<td>
						                  		<?php 
						                  			$this->db->from('jenis_mobil'); 
                                                    $this->db->where('id_jmobil', $row->id_armada);
                                                    $query = $this->db->get();
                                                    if ($query->num_rows() > 0) {
                                                        $jmobil = $query->row();
                                                    }
                                                    $query->free_result();
                                                    echo $jmobil->nama_jmobil; 
						                  		?>
						                  	</td>
						                  	<td><?php echo $this->fppfunction->haritgl_ind($row->tgl_awalsewa); ?></td>
						                  	<td><?php echo $this->fppfunction->haritgl_ind($row->tgl_akhirsewa); ?></td>
						                  	<td><?php echo $row->status_order ?></td>
						                  	<td><?php echo $row->status_bayar ?></td>
						                  	<td class="text-center">
						                  		<a class="btn btn-warning btn-sm" title="Edit" href="order/edit/<?php echo $row->id_order; ?>" /><i class='fa fa-edit'></i></a>
						                  	</td>
						                </tr>
				                	<?php } ?>
				                </tbody>
				            </table>
		        		</div>
		      		</div>
		    	</section>
		  	</div>
