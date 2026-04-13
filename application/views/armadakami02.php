        <section class="page-header">
            <div class="page-header-shape"></div>
            <div class="container">
                <div class="page-header-info">
                    <h2>Rental mobil <span>murah</span> <br> dan <span>mudah</span></h2>
                    <p>Semua jenis mobil rental ada di Shafa Rent Car <br>Proses cepat dan mudah</p>
                </div>
            </div>
        </section>
        
        <section class="our-taxi padding">
            <div class="container">
                <div class="row">
                    <?php foreach ($armadas as $row) { ?>
                        <div class="col-lg-4 col-md-6 padding-15">
                            <div class="pricing-item">
                                <div class="pricing-head-wrap">
                                    <div class="pricing-car">
                                        <img src="<?php echo base_url('uploads/'.$row->gambar1); ?>" />
                                    </div>
                                </div>
                                <div class="pricing-head">
                                    <?php 
                                        $this->db->from('jenis_mobil'); 
                                        $this->db->where('id_jmobil', $row->id_jmobil);
                                        $query = $this->db->get();
                                        if ($query->num_rows() > 0) {
                                            $mobil = $query->row();
                                        }
                                        $query->free_result();
                                    ?>
                                    <h3><?php echo $mobil->nama_jmobil; ?></h3>
                                </div>
                                <ul class="pricing-list">
                                    <li>Dalam Kota: <span><?php echo $this->fppfunction->rupiah_ind($row->hrg_dlmkota)."/".$row->durasi_sewa; ?></span></li>
                                    <!-- <li>Luar Kota: <span><?php echo $this->fppfunction->rupiah_ind($row->hrg_luarkota)."/".$row->durasi_sewa; ?></span></li> -->
                                    <li>&nbsp;</li>
                                    <li><i>* Harga Belum Termasuk Bensin, Tol, Parkir dan Makan Driver</i></li>
                                    <li><a href="home#pesansekarang" class="default-btn">Pesan Sekarang</a></li>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <div class="row">&nbsp;</div>

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="text-center">
                            <style>
                                a:hover.medsos {
                                    /*color: #ff9900 !important;*/
                                    color: #ff9900;
                                }
                            </style>

                            <a class="medsos" href="https://www.instagram.com/shafarentalmobil/" target="_blank">
                                <i class="fab fa-instagram la-2x"></i>
                            </a>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a class="medsos" href="https://www.facebook.com/people/Shafa-Rent-Car/61556439071110/" target="_blank">
                                <i class="fab fa-facebook-f la-2x"></i>
                            </a>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a class="medsos" href="https://www.tiktok.com/@shafa.rental.mobil" target="_blank">
                                <i class="fab fa-tiktok la-2x"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>