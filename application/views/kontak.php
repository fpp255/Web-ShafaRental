        <div class="map-wrapper pt-90">
            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8826.923787362664!2d-118.27754354757262!3d34.03471770929568!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2sLos%20Angeles%2C%20California%2C%20Hoa%20K%E1%BB%B3!5e0!3m2!1svi!2s!4v1566525118697!5m2!1svi!2s" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe> -->

            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15866.643615386765!2d106.74685733856198!3d-6.176129672723709!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f7cfcd4cda87%3A0x9b4698efdd8a8f59!2sShafa%20Rent%20Car!5e0!3m2!1sen!2sid!4v1713603443016!5m2!1sen!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            <!-- <iframe src="https://www.google.com/maps/search/shafa+rent+car/@-6.1727932,106.7451822,14.75z" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe> -->
        </div>

        <section class="contact-section bd-bottom padding">
            <div class="map"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-details-wrap">
                            <div class="contact-title">
                                <h2>Beritahu kami <span>jika mempunyai pertanyaan?</span></h2>
                                <p>Hubungi kami untuk mendiskusikan kebutuhan kendaraan anda hari ini. Silakan hubungi kamimelalui email atau formulir elektronik di samping.</p>
                            </div>
                            <ul class="contact-details">
                                <li><i class="fas fa-map-marker-alt"></i>Jl. Adhi Karya No.21, RT.01/05, Kedoya Selatan<br> Kec. Kebon Jeruk, Jakarta Barat 11520</li>
                                <li><i class="fas fa-envelope"></i>admin@shafarentcar.com <br>rentcarshafa@gmail.com</li>
                                <li><i class="fa fa-whatsapp"></i>0812-9251-5737</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-form">
                            <form id="form1" name="form1" action="<?php echo site_url('/kontak/add')?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="contact-title">
                                    <h2>Hubungi Kami! <span></span></h2>
                                </div>
                                <div class="contact-form-group">
                                    <div class="form-field">
                                        <input type="text" name="firstname" class="form-control" placeholder="Nama Depan" required>
                                    </div>
                                    <div class="form-field">
                                        <input type="text" name="lastname" class="form-control" placeholder="Nama Belakang">
                                    </div>
                                    <div class="form-field message">
                                        <input type="text" name="phone" class="form-control" placeholder="No. HP" required>
                                    </div>
                                    <!-- <div class="form-field">
                                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                                    </div> -->
                                    <div class="form-field message">
                                        <textarea name="message" cols="30" rows="4" class="form-control" placeholder="Pesan" required></textarea>
                                    </div>
                                    <div class="form-field message">
                                        <?php echo $this->recaptcha->render(); ?>
                                    </div>
                                    <div class="form-field">
                                        <style>
                                            input:hover[type="submit"] {
                                                background: #000;
                                            }
                                        </style>
                                        <input type="submit" name="submit" class="default-btn" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kirim&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="row">&nbsp;</div>
                <div class="row">&nbsp;</div>
                <div class="row">&nbsp;</div>

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="text-center">
                            <style>
                                a:hover.medsos {
                                    color: #ff9900;
                                }
                            </style>

                            <a class="medsos" href="https://www.instagram.com/shafa_rental_mobil/" target="_blank">
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

        <?php if ($this->session->flashdata('pesanerror')) { ?>
            <script language="javascript" type="text/javascript">
                window.onload = function() {
                    swal({
                        title: "Failed!",
                        text: "<?php echo $this->session->flashdata('pesanerror');?>",
                        type: "error",
                        confirmButtonText: "Close"
                    });
                }
            </script>
        <?php } else if ($this->session->flashdata('pesansukses')) { ?>
            <script language="javascript" type="text/javascript">
                window.onload = function() {
                    swal({
                        title: "Success!",
                        text: "<?php echo $this->session->flashdata('pesansukses');?>",
                        type: "success",
                        confirmButtonText: "Close"
                    });
                }
            </script>
        <?php } else { ?>
            <!-- sengaja dikosongkan -->
        <?php } ?>