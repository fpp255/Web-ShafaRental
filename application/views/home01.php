        <!-- Page content -->
        <div class="page-content">
            <!-- Main content -->
            <div class="content-wrapper">
                <!-- Content area -->
                <div class="content">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header header-elements-inline">
                                    <h4 class="card-title font-weight-bold">Jumlah DPT</h4>
                                    <div class="header-elements font-weight-bold">
                                        <h4 class="font-weight-semibold"><?php echo $total_dpt ?> Orang</h4>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-3 font-weight-bold">
                                            <div class="d-flex align-items-center mb-1">
                                                <?php if ($total_dpt!=0) { ?>
                                                    <h6 class="font-weight-semibold">Laki-Laki <?php echo number_format($total_dptpria/$total_dpt*100)."%"?></h6>
                                                <?php } else { ?>
                                                    <h6 class="font-weight-semibold">Laki-Laki 0%</h6>
                                                <?php } ?>
                                                <span class="ml-auto">
                                                    <?php if ($total_dpt!=0) { ?>
                                                        <h6 class="font-weight-semibold"><?php echo $total_dptpria ?>/<?php echo $total_dpt ?></h6>
                                                    <?php } else { ?>
                                                        <h6 class="font-weight-semibold">0/0</h6>
                                                    <?php } ?>
                                                </span>
                                            </div>
                                            <div class="progress" style="height: 0.5rem;">
                                                <?php if ($total_dpt!=0) { ?>
                                                    <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" style="width: <?php echo number_format($total_dptpria/$total_dpt*100)?>%;"></div>
                                                <?php } else { ?>
                                                    <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" style="width: 0%;"></div>
                                                <?php } ?>
                                            </div>
                                        </li>
                                        <li class="mb-3 font-weight-bold">
                                            <div class="d-flex align-items-center mb-1">
                                                <?php if ($total_dpt!=0) { ?>
                                                    <h6 class="font-weight-semibold">Perempuan <?php echo number_format($total_dptwanita/$total_dpt*100)."%"?></h6>
                                                <?php } else { ?>
                                                    <h6 class="font-weight-semibold">Perempuan 0%</h6>
                                                <?php } ?>
                                                <span class="ml-auto">
                                                    <?php if ($total_dpt!=0) { ?>
                                                        <h6 class="font-weight-semibold"><?php echo $total_dptwanita ?>/<?php echo $total_dpt ?></h6>
                                                    <?php } else { ?>
                                                        <h6 class="font-weight-semibold">0/0</h6>
                                                    <?php } ?>
                                                </span>
                                            </div>
                                            <div class="progress" style="height: 0.5rem;">
                                                <?php if ($total_dpt!=0) { ?>
                                                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" style="width: <?php echo number_format($total_dptwanita/$total_dpt*100)?>%;"></div>
                                                <?php } else { ?>
                                                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" style="width: 0%;"></div>
                                                <?php } ?>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header header-elements-inline">
                                    <h4 class="card-title font-weight-bold">Jumlah DPTb</h4>
                                    <div class="header-elements font-weight-bold">
                                        <h4 class="font-weight-semibold"><?php echo $total_dptb ?> Orang</h4>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-3 font-weight-bold">
                                            <div class="d-flex align-items-center mb-1">
                                                <?php if ($total_dptb!=0) { ?>
                                                    <h6 class="font-weight-semibold">Laki-Laki <?php echo number_format($total_dptbpria/$total_dptb*100)."%"?></h6>
                                                <?php } else { ?>
                                                    <h6 class="font-weight-semibold">Laki-Laki 0%</h6>
                                                <?php } ?>
                                                <span class="ml-auto">
                                                    <?php if ($total_dptb!=0) { ?>
                                                        <h6 class="font-weight-semibold"><?php echo $total_dptbpria ?>/<?php echo $total_dptb ?></h6>
                                                    <?php } else { ?>
                                                       <h6 class="font-weight-semibold">0/0</h6>
                                                    <?php } ?>
                                                </span>
                                            </div>
                                            <div class="progress" style="height: 0.5rem;">
                                                <?php if ($total_dptb!=0) { ?>
                                                    <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" style="width: <?php echo number_format($total_dptbpria/$total_dptb*100)?>%;"></div>
                                                <?php } else { ?>
                                                    <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" style="width: 0%;"></div>
                                                <?php } ?>
                                            </div>
                                        </li>

                                        <li class="mb-3 font-weight-bold">
                                            <div class="d-flex align-items-center mb-1">
                                                <?php if ($total_dptb!=0) { ?>
                                                    <h6 class="font-weight-semibold">Perempuan <?php echo number_format($total_dptbwanita/$total_dptb*100)."%"?></h6>
                                                <?php } else { ?>
                                                    <h6 class="font-weight-semibold">Perempuan 0%</h6>
                                                <?php } ?>
                                                <span class="ml-auto">
                                                    <?php if ($total_dptb!=0) { ?>
                                                        <h6 class="font-weight-semibold"><?php echo $total_dptbwanita ?>/<?php echo $total_dptb ?></h6>
                                                    <?php } else { ?>
                                                        <h6 class="font-weight-semibold">0/0</h6>
                                                    <?php } ?>
                                                </span>
                                            </div>
                                            <div class="progress" style="height: 0.5rem;">
                                                <?php if ($total_dptb!=0) { ?>
                                                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" style="width: <?php echo number_format($total_dptbwanita/$total_dptb*100)?>%;"></div>
                                                <?php } else { ?>
                                                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" style="width: 0%;"></div>
                                                <?php } ?>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header header-elements-inline">
                                    <h4 class="card-title font-weight-bold">Jumlah DPK</h4>
                                    <div class="header-elements font-weight-bold">
                                        <h4 class="font-weight-semibold"><?php echo $total_dpk ?> Orang</h4>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-3 font-weight-bold">
                                            <div class="d-flex align-items-center mb-1">
                                                <?php if ($total_dpk!=0) { ?>
                                                    <h6 class="font-weight-semibold">Laki-Laki <?php echo number_format($total_dpkpria/$total_dpk*100)."%"?></h6>
                                                <?php } else { ?>
                                                    <h6 class="font-weight-semibold">Laki-Laki 0%</h6>
                                                <?php } ?>
                                                <span class="ml-auto">
                                                    <?php if ($total_dpk!=0) { ?>
                                                        <h6 class="font-weight-semibold"><?php echo $total_dpkpria ?>/<?php echo $total_dpk ?></h6>
                                                    <?php } else { ?>
                                                        <h6 class="font-weight-semibold">0/0</h6>
                                                    <?php } ?>
                                                </span>
                                            </div>
                                            <div class="progress" style="height: 0.5rem;">
                                                <?php if ($total_dpk!=0) { ?>
                                                    <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" style="width: <?php echo number_format($total_dpkpria/$total_dpk*100)?>%;"></div>
                                                <?php } else { ?>
                                                    <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" style="width: 0%;"></div>
                                                <?php } ?>
                                            </div>
                                        </li>

                                        <li class="mb-3 font-weight-bold">
                                            <div class="d-flex align-items-center mb-1">
                                                <?php if ($total_dpk!=0) { ?>
                                                    <h6 class="font-weight-semibold">Perempuan <?php echo number_format($total_dpkwanita/$total_dpk*100)."%"?></h6>
                                                <?php } else { ?>
                                                    <h6 class="font-weight-semibold">Perempuan 0%</h6>
                                                <?php } ?>
                                                <span class="ml-auto">
                                                    <?php if ($total_dpk!=0) { ?>
                                                        <h6 class="font-weight-semibold"><?php echo $total_dpkwanita ?>/<?php echo $total_dpk ?></h6>
                                                    <?php } else { ?>
                                                        <h6 class="font-weight-semibold">0/0</h6>
                                                    <?php } ?>
                                                </span>
                                            </div>
                                            <div class="progress" style="height: 0.5rem;">
                                                <?php if ($total_dpk!=0) { ?>
                                                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" style="width: <?php echo number_format($total_dpkwanita/$total_dpk*100)?>%;"></div>
                                                <?php } else { ?>
                                                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" style="width: 0%;"></div>
                                                <?php } ?>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header header-elements-inline">
                                    <h4 class="card-title font-weight-bold">Jumlah Kehadiran</h4>
                                </div>
                                <div class="card-body font-weight-bold">
                                    <ul class="list list-unstyled mb-2.2">
                                        <li>
                                            <h6 class="font-weight-semibold">DPT <span class="float-right"><?php echo $total_absendpt ?>/<?php echo $total_dpt ?></span></h6>
                                        </li>
                                        <li>
                                            <h6 class="font-weight-semibold">DPTb <span class="float-right"><?php echo $total_absendptb ?>/<?php echo $total_dptb ?></span></h6>
                                        </li>
                                        <li>
                                            <h6 class="font-weight-semibold">DPK <span class="float-right"><?php echo $total_absendpk ?>/<?php echo $total_dpk ?></span></h6>
                                        </li>
                                        <li>
                                            <h6 class="font-weight-semibold">Total <span class="float-right"><?php echo $total_absendpt + $total_absendptb + $total_absendpk ?>/<?php echo $total_dpt + $total_dptb + $total_dpk ?></span></h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <!-- Sidebars overview -->
                            <div class="card">
                                <div class="card-header header-elements-inline">
                                    <h4 class="card-title font-weight-bold">Kehadiran DPT</h4>
                                    <div class="header-elements font-weight-bold">
                                        <h4 class="font-weight-bold"><?php echo number_format($total_absendpt/$total_dpt*100)?> %</h4>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <canvas id="piechart" width="205" height="205"></canvas>
                                        </div>
                                        <div class="col-md-6">
                                            <p><button type="button" class="btn btn-danger btn-sm">&nbsp;&nbsp;</button>&nbsp;&nbsp;Laki-Laki = <?php echo $total_absendptpria ?> Orang</p>

                                            <p><button type="button" class="btn btn-info btn-sm">&nbsp;&nbsp;</button>&nbsp;&nbsp;Perempuan = <?php echo $total_absendptwanita ?> Orang</p>
                                        </div>
                                    </div>

                                    <script type="text/javascript">
                                        var obj = {
                                            values: [<?php echo $total_absendptwanita ?>, <?php echo $total_absendptpria ?>],
                                            colors: ['#00BCD4', '#F44336'],
                                            animation: true, // Takes boolean value & default behavious is false
                                            animationSpeed: 10, // Time in miliisecond & default animation speed is 20ms
                                            fillTextData: true, // Takes boolean value & text is not generate by default 
                                            fillTextColor: '#fff', // For Text colour & default colour is #fff (White)
                                            fillTextAlign: 1.30, // for alignment of inner text position i.e. higher values gives closer view to center & default text alignment is 1.85 i.e closer to center
                                            fillTextPosition: 'inner', // 'horizontal' or 'vertical' or 'inner' & default text position is 'horizontal' position i.e. outside the canvas
                                            doughnutHoleSize: 45, // Percentage of doughnut size within the canvas & default doughnut size is null
                                            doughnutHoleColor: '#fff', // For doughnut colour & default colour is #fff (White)
                                            offset: 1, // Offeset between two segments & default value is null
                                            pie: 'normal', // if the pie graph is single stroke then we will add the object key as "stroke" & default is normal as simple as pie graph
                                            isStrokePie: { 
                                                stroke: 20, // Define the stroke of pie graph. It takes number value & default value is 20
                                                overlayStroke: true, // Define the background stroke within pie graph. It takes boolean value & default value is false
                                                overlayStrokeColor: '#eee', // Define the background stroke colour within pie graph & default value is #eee (Grey)
                                                strokeStartEndPoints: 'Yes', // Define the start and end point of pie graph & default value is No
                                                strokeAnimation: true, // Used for animation. It takes boolean value & default value is true
                                                strokeAnimationSpeed: 40, // Used for animation speed in miliisecond. It takes number & default value is 20ms
                                                fontSize: '60px', // Used to define text font size & default value is 60px
                                                textAlignement: 'center', // Used for position of text within the pie graph & default value is 'center'
                                                fontFamily: 'Arial', // Define the text font family & the default value is 'Arial'
                                                fontWeight: 'bold' //  Define the font weight of the text & the default value is 'bold'
                                            }
                                        };
                                        //Generate piechart     
                                        generatePieGraph('piechart', obj);
                                    </script>
                                </div>
                            </div>
                            <!-- /sidebars overview -->
                        </div>

                        <div class="col-md-4">
                            <!-- Sidebars overview -->
                            <div class="card">
                                <div class="card-header header-elements-inline">
                                    <h4 class="card-title font-weight-bold">Panggilan Selanjutnya</h4>
                                </div>
                                <div class="card-body">
                                    <!-- <script type = "text/JavaScript">
                                        $(document).ready(
                                             function() {
                                             setInterval(function() {
                                              $('#sample').text('Test');
                                             }, 30000);  //Delay here = 30 seconds 
                                        });
                                    </script> -->
                                    <!-- <div id="sample"> -->
                                    <div class="text-center">
                                        <?php if ($absendpt) { ?>
                                            <img class="rounded-circle" width="24%" src="<?php echo site_url('photo/'.$absendpt->photo)?>" />
                                            <p class="text-muted text-center">&nbsp;</p>
                                            <style>
                                                .blink_me {
                                                    animation: blinker 2s linear infinite;
                                                }

                                                @keyframes blinker {  
                                                    50% { opacity: 0; }
                                                } 
                                            </style>
                                            <h3 class="text-center blink_me" style="font-size:27px;"><?php echo $absendpt->namaDPT ?></h3>
                                            <p class="text-center blink_me"><?php echo $absendpt->alamatJalan." RT.".$absendpt->alamatRT." RW.".$absendpt->alamatRW ?></p>
                                        <?php } else { ?>
                                            <img class="rounded-circle" width="30%" src="<?php echo site_url('photo/male_profile.png')?>" />
                                            <style>
                                                .blink_me {
                                                    animation: blinker 2s linear infinite;
                                                }

                                                @keyframes blinker {  
                                                    50% { opacity: 0; }
                                                } 
                                            </style>
                                            <p class="font-weight-bold text-center blink_me" style="font-size:25px;">Pulan Bin Pulan
                                            <br/><span style="font-size:20px;">Kav. Barokah</span></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /sidebars overview -->
                        </div>

                         <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-img embed-responsive embed-responsive-16by9 mb-3">
                                        <video id="myvideo" width="100%" autoplay muted>
                                            <!-- <source class="active" src="<?php echo site_url('uploads/Pemilu2024_01.mp4')?>" type="video/mp4" />
                                            <source src="<?php echo site_url('uploads/Pemilu2024_03.mp4')?>" type="video/mp4" />
                                            <source src="<?php echo site_url('uploads/Pemilu2024_02.mp4')?>" type="video/mp4" /> -->

                                            <?php foreach ($videos as $row) { ?>
                                                <source src="<?php echo site_url('uploads/'.$row->file_video)?>" type="video/mp4" />
                                            <?php } ?>
                                        </video>

                                        <script type="text/javascript">
                                            var myvid = document.getElementById('myvideo');
                                            myvid.addEventListener('ended', function(e) {
                                              // get the active source and the next video source.
                                              // I set it so if there's no next, it loops to the first one
                                              var activesource = document.querySelector("#myvideo source.active");
                                              var nextsource = document.querySelector("#myvideo source.active + source") || document.querySelector("#myvideo source:first-child");
                                              
                                              // deactivate current source, and activate next one
                                              activesource.className = "";
                                              nextsource.className = "active";
                                              
                                              // update the video source and play
                                              myvid.src = nextsource.src;
                                              myvid.play();
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /content area -->