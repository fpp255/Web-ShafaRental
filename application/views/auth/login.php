<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Shafa Rent Car Backend System">

    
    <title>Shafa Rent Car Backend System</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/frontend/img/favicon.ico">
    <link rel='stylesheet' href="<?php echo base_url(); ?>assets/login/normalize.min.css">
    <link rel='stylesheet' href="<?php echo base_url(); ?>assets/login/animate.min.css">
    <link rel='stylesheet' href="<?php echo base_url(); ?>assets/login/pengaya.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/sweetalert.css">

    <script>
      window.console = window.console || function(t) {};
    </script>

    <script>
      if (document.location.search.match(/type=embed/gi)) {
        window.parent.postMessage("resize", "*");
      }
    </script>
  </head>

  <body translate="no" >
    <div class='box'>
      <div class='box-form'>
        <div class='box-login-tab'></div>
        <div class='box-login-title'>
          <div class='i i-login'></div><h2>LOGIN</h2>
        </div>
        <div class='box-login'>
          <div class='fieldset-body' id='login_form'>
            <form id="form1" name="form1" action="<?php echo site_url('auth/login/')?>" method="post" accept-charset="utf-8">
              <button onclick="openLoginInfo();" class='b b-form i i-more'></button>
              <p class='field'>
                <label for="user">USER NAME</label>
                <input type="text" name="identity" value="" id="identity" autofocus="autofocus"/>
              </p>

              <p class="field">
                <label for="pass">PASSWORD</label>
                <input type="password" required="" name="password" value="" id="password"/>
              </p>
              <!-- <input type="submit" id="do_login" value="MASUK" /> -->
              
              <button type="submit" class="BtnMasuk">MASUK</button>
            </form>
          </div>
        </div>
      </div>
      <div class='box-info'>
        <p><button onclick="closeLoginInfo();" class='b b-info i i-left' title='Tutup'></button></p>
        <div class='line-wh'></div>
        <p>&nbsp;</p>
        <a href="<?php echo site_url('auth/forgot_password'); ?>"><button class='b-support' title='Lupa Password?'> Lupa Password?</button></a>
        <div class='line-wh'></div>
        <p>&nbsp;</p>
      </div>
    </div>

    <?php if ($this->session->flashdata('psnSksEmail')) { ?>
      <script language="javascript" type="text/javascript">
        window.onload = function(){
          swal({
            title: "Sukses",
            text: "<?php echo $this->session->flashdata('psnSksEmail');?>",
            type: "success",
            confirmButtonText: "Close"
          });
        }
      </script> 
    <?php } elseif ($this->session->flashdata('psnSksReset')) { ?>  
        <script language="javascript" type="text/javascript">
          window.onload = function(){
            swal({
              title: "Sukses!",
              text: "<?php echo $this->session->flashdata('psnSksReset');?>",
              type: "success",
              confirmButtonText: "Close"
            });
          }
        </script> 
    <?php } else { ?> 
      &nbsp;
    <?php } ?>

    <script src="<?php echo base_url(); ?>assets/login/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/modernizr.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/frontend/js/sweetalert.min.js"></script>
    <script id="rendered-js" >
      $(document).ready(function () {
        $("#do_login").click(function () {
          closeLoginInfo();
          $(this).parent().find('span').css("display", "none");
          $(this).parent().find('span').removeClass("i-save");
          $(this).parent().find('span').removeClass("i-warning");
          $(this).parent().find('span').removeClass("i-close");

          var proceed = true;
          $("#login_form input").each(function () {

            if (!$.trim($(this).val())) {
              $(this).parent().find('span').addClass("i-warning");
              $(this).parent().find('span').css("display", "block");
              proceed = false;
            }
          });

          if (proceed) //everything looks good! proceed...
          {
            $(this).parent().find('span').addClass("i-save");
            $(this).parent().find('span').css("display", "block");
          }
        });

        //reset previously results and hide all message on .keyup()
        $("#login_form input").keyup(function () {
          $(this).parent().find('span').css("display", "none");
        });

        openLoginInfo();
        setTimeout(closeLoginInfo, 1000);
      });

      function openLoginInfo() {
        $(document).ready(function () {
          $('.b-form').css("opacity", "0.01");
          $('.box-form').css("left", "-37%");
          $('.box-info').css("right", "-37%");
        });
      }

      function closeLoginInfo() {
        $(document).ready(function () {
          $('.b-form').css("opacity", "1");
          $('.box-form').css("left", "0px");
          $('.box-info').css("right", "-5px");
        });
      }

      $(window).on('resize', function () {
        closeLoginInfo();
      });
    </script>
  </body>
</html>