<ul class="right-side-content d-flex align-items-center">
    <!--<li class="nav-item dropdown">
        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="border-radius-none" src="<?php echo base_url(); ?>public/riktheme/img/core-img/l3.jpg" alt=""></button>
        <div class="dropdown-menu language-dropdown dropdown-menu-right">
            <a href="#" class="dropdown-item"><img src="<?php echo base_url(); ?>public/riktheme/img/core-img/l1.jpg" alt=""> IND</a>
            <a href="#" class="dropdown-item"><img src="<?php echo base_url(); ?>public/riktheme/img/core-img/l2.jpg" alt=""> LOP</a>
            <a href="#" class="dropdown-item"><img src="<?php echo base_url(); ?>public/riktheme/img/core-img/l3.jpg" alt=""> KYI</a>
            <a href="#" class="dropdown-item"><img src="<?php echo base_url(); ?>public/riktheme/img/core-img/l4.jpg" alt=""> RTY</a>
        </div>
    </li>-->
    <!-- Full Screen Mode -->
    <!--<li class="full-screen-mode ml-1">
        <a href="javascript:" id="fullScreenMode"><i class="zmdi zmdi-fullscreen"></i></a>
    </li>-->

    <!--<li class="nav-item dropdown">
        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon_globe-2" aria-hidden="true"></i></button>

        <div class="dropdown-menu dropdown-menu-right">
            <div class="top-message-area">
                <div class="top-message-heading">
                    <div class="heading-title">
                        <h6>Messages</h6>
                    </div>
                    <span>5 New</span>
                </div>
                <div class="message-box" id="messageBox">
                    <a href="#" class="dropdown-item">
                        <i class="zmdi zmdi-email-open"></i>
                        <span class="message-text">
                            <span>6-hour video course on Angular</span>
                            <span>3 min ago</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </li>-->

    <!--<li class="nav-item dropdown">
        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon_lightbulb_alt" aria-hidden="true"></i> <span class="active-status"></span></button>
        <div class="dropdown-menu dropdown-menu-right">
            <div class="top-notifications-area">
                <div class="notifications-heading">
                    <div class="heading-title">
                        <h6>Notifications</h6>
                    </div>
                    <span>5 New</span>
                </div>

                <div class="notifications-box" id="notificationsBox">
                    <a href="#" class="dropdown-item"><i class="ti-face-smile bg-success"></i><span>We've got something for you!</span></a>
                    <a href="#" class="dropdown-item"><i class="zmdi zmdi-notifications-active bg-danger"></i><span>Domain names expiring on Tuesday</span></a>
                    <a href="#" class="dropdown-item"><i class="ti-check"></i><span>Your commissions has been sent</span></a>
                    <a href="#" class="dropdown-item"><i class="ti-heart bg-success"></i><span>You sold an item!</span></a>
                    <a href="#" class="dropdown-item"><i class="ti-bolt bg-warning"></i><span>Security alert for your linked Google account</span></a>
                    <a href="#" class="dropdown-item"><i class="ti-face-smile bg-success"></i><span>We've got something for you!</span></a>
                    <a href="#" class="dropdown-item"><i class="zmdi zmdi-notifications-active bg-danger"></i><span>Domain names expiring on Tuesday</span></a>
                    <a href="#" class="dropdown-item"><i class="ti-check"></i><span>Your commissions has been sent</span></a>
                    <a href="#" class="dropdown-item"><i class="ti-heart bg-success"></i><span>You sold an item!</span></a>
                    <a href="#" class="dropdown-item"><i class="ti-bolt bg-warning"></i><span>Security alert for your linked Google account</span></a>
                </div>
            </div>
        </div>
    </li>-->

    <li class="nav-item dropdown">
        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <?php
		  if(is_file(APPPATH.'../public/'.$this->session->userdata['file_picture'])&&file_exists(APPPATH.'../public/'.$this->session->userdata['file_picture']))
		   {
		 ?>
			  <img class="border-radius-50" src="<?php echo base_url().'public/'.$this->session->userdata['file_picture']?>" alt="">
		<?php
			}
			else
			{
		?>
			  <img class="border-radius-50" src="<?php echo base_url()?>public/uploads/no_image.jpg">
		<?php		
			}
		  ?>
        </button>  
        <div class="dropdown-menu dropdown-menu-right">
            <!-- User Profile Area -->
            <div class="user-profile-area">
                <div class="user-profile-heading">
                    <!-- Thumb -->
                    <div class="profile-thumbnail">
                    <?php
					  if(is_file(APPPATH.'../public/'.$this->session->userdata['file_picture'])&&file_exists(APPPATH.'../public/'.$this->session->userdata['file_picture']))
					   {
					 ?>
					      <img class="border-radius-50" src="<?php echo base_url().'public/'.$this->session->userdata['file_picture']?>" alt="">
					<?php
						}
						else
						{
					?>
					      <img class="border-radius-50" src="<?php echo base_url()?>public/uploads/no_image.jpg">
					<?php		
						}
					  ?>
                    </div>
                    <!-- Profile Text -->
                    <div class="profile-text">
                        <h6><?php echo $this->session->userdata['first_name']?> <?php echo $this->session->userdata['last_name']?></h6>
                        <!--<span><?php echo $this->session->userdata['first_name']?></span>-->
                    </div>
                </div>
                <a href="<?php echo site_url('admin/profile/index'); ?>" class="dropdown-item"><i class="ti-user text-default" aria-hidden="true"></i> My profile</a>
                <a href="<?php echo site_url('admin/login/do_logout'); ?>" class="dropdown-item"><i class="ti-unlink text-warning" aria-hidden="true"></i> Sign-out</a>
            </div>
        </div>
    </li>
</ul>