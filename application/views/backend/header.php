<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="description" content="Shafa Rent Car Backend System">
        <title>Shafa Rent Car Backend System</title>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/frontend/img/favicon.ico">
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/Ionicons/css/ionicons.min.css">

        <!-- MORRIS CHARTS -->
        <?php if ($nopage==1001) { ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/morris.js/morris.css">
        <?php } ?>

        <!--DATATABLES-->
        <?php if ($nopage==1011||$nopage==1021||$nopage==1031||$nopage==1041||$nopage==1051) { ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <?php } ?>
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/sweetalert/sweetalert.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/skins/_all-skins.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
  
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
              <a href="#" class="logo">
                  <span class="logo-mini"><b>Adm</b></span>
                  <span class="logo-lg"><b>Admin Pages</b></span>
              </a>
              
              <nav class="navbar navbar-static-top">
                  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                  <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php 
                              $this->db->select('group_id');
                              $this->db->from('users_groups'); 
                              $this->db->where('id', $user->id);
                              $query = $this->db->get();
                              if ($query->num_rows() > 0) {
                                  $kelompok = $query->row();
                              }
                              $query->free_result();
                            ?>
                            <?php if ($kelompok->group_id==1) { ?>
                            <img src="<?php echo base_url(); ?>assets/backend/img/AvatarAdmin.png" class="user-image" alt="User Image">
                            <?php } else { ?>
                            <img src="<?php echo base_url(); ?>assets/backend/img/AvatarMoslem.png" class="user-image" alt="User Image">
                            <?php } ?>
                            <span class="hidden-xs"><?php echo $user->first_name." ".$user->last_name ?></span>
                          </a>
                          <ul class="dropdown-menu">
                              <li class="user-header">
                                <?php if ($kelompok->group_id==1) { ?>
                                <img src="<?php echo base_url(); ?>assets/backend/img/AvatarAdmin.png" class="img-circle" alt="User Image">
                                <?php } else { ?>
                                <img src="<?php echo base_url(); ?>assets/backend/img/AvatarMoslem.png" class="img-circle" alt="User Image">

                                <?php } ?>
                                <p><?php echo $user->first_name." ".$user->last_name ?></p>
                              </li>
                              <li class="user-footer">
                                <div class="pull-left">
                                    <!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo base_url('auth/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                              </li>
                          </ul>
                      </li>
                    </ul>
                  </div>
              </nav>
            </header>

            <aside class="main-sidebar">
                <section class="sidebar">
                    <div class="user-panel">
                        <div class="pull-left image">
                          <?php if ($kelompok->group_id==1) { ?>
                            <img src="<?php echo base_url(); ?>assets/backend/img/AvatarAdmin.png" class="img-circle" alt="User Image">
                          <?php } else { ?>
                            <img src="<?php echo base_url(); ?>assets/backend/img/AvatarMoslem.png" class="img-circle" alt="User Image">
                          <?php } ?>
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $user->first_name." ".$user->last_name ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>

                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MAIN NAVIGATION</li>
                    
                        <li <?php if ($nopage==1001) echo "class='active'"; ?>>
                            <a href="<?php echo site_url('backend/')?>">
                              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>

                        <li <?php if ($nopage==1011||$nopage==1012) echo "class='active'"; ?>>
                            <a href="<?php echo site_url('backend/order')?>">
                              <i class="fa fa-line-chart"></i> <span>Order</span>
                            </a>
                        </li>

                        <?php if ($nopage==1021||$nopage==1022||$nopage==1023) { ?>
                        <li class="treeview active">
                        <?php } else { ?>
                        <li class="treeview">
                        <?php } ?>
                          <a href="#">
                            <i class="fa fa-car"></i> <span>Jenis Mobil</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                            <?php if ($nopage==1021||$nopage==1022) { ?>
                            <li class="active">
                            <?php } else { ?>
                            <li>
                            <?php } ?>
                              <a href="<?php echo site_url('backend/jmobil')?>"><i class="fa fa-circle-thin"></i> List Jenis Mobil</a>
                            </li>
                            <?php if ($nopage==1023) { ?>
                            <li class="active">
                            <?php } else { ?>
                            <li>
                            <?php } ?>
                              <a href="<?php echo site_url('backend/jmobil/add')?>"><i class="fa fa-circle-thin"></i> Tambah Jenis Mobil</a>
                            </li>
                          </ul>
                        </li>

                        <?php if ($nopage==1031||$nopage==1032||$nopage==1033) { ?>
                        <li class="treeview active">
                        <?php } else { ?>
                        <li class="treeview">
                        <?php } ?>
                          <a href="#">
                            <i class="fa fa-bus"></i> <span>Armada</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                            <?php if ($nopage==1031||$nopage==1032) { ?>
                            <li class="active">
                            <?php } else { ?>
                            <li>
                            <?php } ?>
                              <a href="<?php echo site_url('backend/armada')?>"><i class="fa fa-circle-thin"></i> List Armada</a>
                            </li>
                            <?php if ($nopage==1033) { ?>
                            <li class="active">
                            <?php } else { ?>
                            <li>
                            <?php } ?>
                              <a href="<?php echo site_url('backend/armada/add')?>"><i class="fa fa-circle-thin"></i> Tambah Armada</a>
                            </li>
                          </ul>
                        </li>

                        <li <?php if ($nopage==1041) echo "class='active'"; ?>>
                            <?php
                              $this->db->select('id_pesan');
                              $this->db->from('pesan'); 
                              $this->db->where('baca', 0);
                              $query = $this->db->get();
                              $totpesan = $query->num_rows();
                            ?>
                            <a href="<?php echo site_url('backend/pesan')?>">
                              <i class="fa fa-envelope"></i> <span>Pesan</span>
                              <span class="pull-right-container">
                                <small class="label pull-right bg-red"><?php echo $totpesan;?></small>
                              </span>
                            </a>
                        </li>

                        
                        <?php if ($nopage==1051||$nopage==1052||$nopage==1053) { ?>
                        <li class="treeview active">
                        <?php } else { ?>
                        <li class="treeview">
                        <?php } ?>
                          <a href="#">
                            <i class="fa fa-users"></i> <span>Pengguna</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                            <?php if ($nopage==1051||$nopage==1052) { ?>
                            <li class="active">
                            <?php } else { ?>
                            <li>
                            <?php } ?>
                              <a href="<?php echo site_url('backend/pengguna')?>"><i class="fa fa-circle-thin"></i> List Pengguna</a>
                            </li>
                            <?php if ($nopage==1053) { ?>
                            <li class="active">
                            <?php } else { ?>
                            <li>
                            <?php } ?>
                              <a href="<?php echo site_url('backend/pengguna/add')?>"><i class="fa fa-circle-thin"></i> Tambah Pengguna</a>
                            </li>
                          </ul>
                        </li>
                    </ul>
                </section>
            </aside>