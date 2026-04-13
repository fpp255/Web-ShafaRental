		 	<div class="content-wrapper">
			    <section class="content-header">
			     	<h1>Pengguna</h1>
		      		<ol class="breadcrumb">
		        		<li class="active"><i class="fa fa-users"></i> Pengguna</li>
		      		</ol>
		   			</section>
		    	
		    	<section class="content">
		      		<div class="box">
		        		<div class="box-header with-border">
		          			<h3 class="box-title">List Pengguna</h3>
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

		          			<table id="tabelpengguna" class="table table-bordered table-hover">
				                <thead>
					                <tr>
						                <th class="text-center">Nama Lengkap</th>
						                <th class="text-center">Username</th>
						                <th class="text-center">Status</th>
						                <th class="text-center">Aksi</th>
					                </tr>
				                </thead>
				                <tbody>
				                	<?php foreach ($penggunas as $row) { ?>
				                		<tr>
						                  	<td><?php echo $row->first_name." ".$row->last_name; ?></td>
						                  	<td class="text-right"><?php echo $row->username; ?></td>
						                  	<td class="text-right">
						                  		<?php 
                                                    if ($row->active==1) {
                                                        echo "Aktif";
                                                    } else {
                                                        echo "Tidak Aktif";
                                                    }
                                              	?>   
						                  	</td>
						                  	<td class="text-center">
						                  		<a class="btn btn-warning btn-sm" title="Edit" href="/backend/pengguna/edit/<?php echo $row->id; ?>" /><i class="fa fa-edit"></i></a>

						                  		<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modaldelPengguna<?php echo $row->id; ?>" title="Delete Data"><i class="fa fa-trash-o"></i></a>
						                  	</td>
						                </tr>

						                <div class="modal fade" id="modaldelPengguna<?php echo $row->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title"><i class="fa fa-trash-o"></i> Delete Data Pengguna</h4>
													</div>
													<form id="form1" name="form1" action="<?php echo site_url('backend/pengguna/hapus/'.$row->id)?>" method="post" enctype="multipart/form-data">
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
