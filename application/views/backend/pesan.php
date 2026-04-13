		 	<div class="content-wrapper">
			    <section class="content-header">
			     	<h1>Pesan</h1>
		      		<ol class="breadcrumb">
		        		<li class="active"><i class="fa fa-envelope"></i> Pesan</li>
		      		</ol>
		   			</section>
		    	
		    	<section class="content">
		      		<div class="box">
		        		<div class="box-header with-border">
		          			<h3 class="box-title">List Pesan</h3>
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

		          			<table id="tabelpesan" class="table table-bordered table-hover">
				                <thead>
					                <tr>
						                <th class="text-center">Nama</th>
						                <th class="text-center">No. HP</th>
						                <th class="text-center">Email</th>
						                <th class="text-center">Pesan</th>
						                <th class="text-center">Aksi</th>
					                </tr>
				                </thead>
				                <tbody>
				                	<?php foreach ($pesans as $row) { ?>
				                		<tr>
						                  	<td <?php if ($row->baca==0) {echo "class='text-bold'";} ?> /><?php echo $row->nama_depan." ".$row->nama_belakang; ?></td>
						                  	<td <?php if ($row->baca==0) {echo "class='text-bold'";} ?> /><?php echo $row->no_hp; ?></td>
						                  	<td <?php if ($row->baca==0) {echo "class='text-bold'";} ?> /><?php echo $row->email; ?></td>
						                  	<td <?php if ($row->baca==0) {echo "class='text-bold'";} ?> /><?php echo $row->pesan; ?></td>
						                  	<td class="text-center">
						                  		<a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modaldetailPesan<?php echo $row->id_pesan; ?>" title="Detail"><i class="fa fa-folder-open-o"></i></a>

						                  		<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modaldelPesan<?php echo $row->id_pesan; ?>" title="Delete Data"><i class="fa fa-trash-o"></i></a>
						                  	</td>
						                </tr>

						                <div class="modal fade" id="modaldetailPesan<?php echo $row->id_pesan ?>" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title"><i class="fa fa-folder-open-o"></i> Detail Data</h4>
													</div>
													<form name="form1" class="form-horizontal" action="<?php echo site_url('/backend/pesan/detail/'.$row->id_pesan)?>" method="post" enctype="multipart/form-data">
														<div class="modal-body">
						                                    <dl class="dl-horizontal">
						                                        <dt>Nama:</dt>
						                                        <dd><?php echo $row->nama_depan." ".$row->nama_belakang; ?></dd>
						                                        <dt>No. HP:</dt>
						                                        <dd><?php echo $row->no_hp; ?></dd>
						                                        <dt>Email:</dt>
						                                        <dd><?php echo $row->email; ?></dd>
						                                        <dt>Pesan:</dt>
						                                        <dd><?php echo $row->pesan; ?></dd>
						                                    </dl>
														</div>
														<div class="modal-footer clearfix">
															<input type="hidden" name="idpesan" value="<?php echo $row->id_pesan; ?>">
															<input type="hidden" name="dibaca" value="1">

															<input type="submit" name="submit" class="btn btn-primary" value="&nbsp;&nbsp;&nbsp;Tutup&nbsp;&nbsp;&nbsp;">
														</div>
											        </form>
												</div>
											</div>
										</div>

						                <div class="modal fade" id="modaldelPesan<?php echo $row->id_pesan ?>" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title"><i class="fa fa-trash-o"></i> Delete Data Pesan</h4>
													</div>
													<form id="form1" name="form1" action="<?php echo site_url('backend/pesan/hapus/'.$row->id_pesan)?>" method="post" enctype="multipart/form-data">
														<div class="modal-body">
															<div class="form-group">
																<label>Click OK to Confirm!</label>
															</div>	
														</div>
														<div class="modal-footer clearfix">
															<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
															<input type="submit" name="submit" class="btn btn-primary" value="&nbsp;&nbsp;&nbsp;OK&nbsp;&nbsp;&nbsp;">
														</div>
													</form>
												</div>
											</div>
										</div>
				                	<?php } ?>
				                </tbody>
				            </table>
		        		</div>
		      		</div>
		    	</section>
		  	</div>
