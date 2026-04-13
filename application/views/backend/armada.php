		 	<div class="content-wrapper">
			    <section class="content-header">
			     	<h1>Armada</h1>
		      		<ol class="breadcrumb">
		        		<li class="active"><i class="fa fa-bus"></i> Armada</li>
		      		</ol>
		   			</section>
		    	
		    	<section class="content">
		      		<div class="box">
		        		<div class="box-header with-border">
		          			<h3 class="box-title">List Armada</h3>
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

		          			<table id="tabelarmada" class="table table-bordered table-hover">
				                <thead>
					                <tr>
						                <th class="text-center">Nama Mobil</th>
						                <th class="text-center">Harga Dalam Kota</th>
						                <!-- <th class="text-center">Harga Luar Kota</th> -->
						                <th class="text-center">Durasi Sewa</th>
						                <th class="text-center">Status</th>
						                <th class="text-center">Aksi</th>
					                </tr>
				                </thead>
				                <tbody>
				                	<?php foreach ($armadas as $row) { ?>
				                		<tr>
						                  	<td>
						                  		<?php 
						                  			$this->db->select('nama_jmobil');
                                                    $this->db->from('jenis_mobil'); 
                                                    $this->db->where('id_jmobil', $row->id_jmobil);
                                                    $query = $this->db->get();
                                                    if ($query->num_rows() > 0) {
                                                        $jmobil = $query->row();
                                                    }
                                                    $query->free_result();
                                                    echo $jmobil->nama_jmobil; 
                                                ?>
						                  	</td>
						                  	<td class="text-right"><?php echo $this->fppfunction->rupiah_ind($row->hrg_dlmkota); ?></td>
						                  	<!-- <td class="text-right"><?php echo $this->fppfunction->rupiah_ind($row->hrg_luarkota); ?></td> -->
						                  	<td class="text-left"><?php echo $row->durasi_sewa; ?></td>
						                  	<td class="text-left"><?php echo $row->status_tayang; ?></td>
						                  	<td class="text-center">
						                  		<a class="btn btn-warning btn-sm" title="Edit" href="/backend/armada/edit/<?php echo $row->id_armada; ?>" /><i class="fa fa-edit"></i></a>

						                  		<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modaldelArmada<?php echo $row->id_armada; ?>" title="Delete Data"><i class="fa fa-trash-o"></i></a>
						                  	</td>
						                </tr>

						                <div class="modal fade" id="modaldelArmada<?php echo $row->id_armada ?>" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title"><i class="fa fa-trash-o"></i> Delete Data Armada</h4>
													</div>
													<form id="form1" name="form1" action="<?php echo site_url('backend/armada/hapus/'.$row->id_armada)?>" method="post" enctype="multipart/form-data">
														<div class="modal-body">
															<div class="form-group">
																<label>Click OK to Confirm!</label>
															</div>	
														</div>
														<div class="modal-footer clearfix">
															<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
															<input type="hidden" name="filegmbr" value="<?php echo $row->gambar1; ?>">
															<input type="hidden" name="filebg" value="<?php echo $row->gambar2; ?>">
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
