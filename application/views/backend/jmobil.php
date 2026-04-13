		 	<div class="content-wrapper">
			    <section class="content-header">
			     	<h1>Jenis Mobil</h1>
		      		<ol class="breadcrumb">
		        		<li class="active"><i class="fa fa-car"></i> Jenis Mobil</li>
		      		</ol>
		   			</section>
		    	
		    	<section class="content">
		      		<div class="box">
		        		<div class="box-header with-border">
		          			<h3 class="box-title">List Jenis Mobil</h3>
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

		          			<table id="tabeljmobil" class="table table-bordered table-hover">
				                <thead>
					                <tr>
						                <th>Nama Mobil</th>
						                <th>Tgl. Update</th>
						                <th>Aksi</th>
					                </tr>
				                </thead>
				                <tbody>
				                	<?php foreach ($jmobils as $row) { ?>
				                		<tr>
						                  	<td width="80%"><?php echo $row->nama_jmobil ?></td>
						                  	<td><?php echo $this->fppfunction->tglangkajam_ind($row->tgl_editjmobil); ?></td>
						                  	<td class="text-center">
						                  		<a class="btn btn-warning btn-sm" title="Edit" href="/backend/jmobil/edit/<?php echo $row->id_jmobil; ?>" /><i class='fa fa-edit'></i></a>
						                  	</td>
						                </tr>
				                	<?php } ?>
				                </tbody>
				            </table>
		        		</div>
		      		</div>
		    	</section>
		  	</div>
