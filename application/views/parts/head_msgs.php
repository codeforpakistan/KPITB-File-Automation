    <body class="page-header-fixed">
        <div class="overlay"></div>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right print" id="cbp-spmenu-s1">
            <h3><span class="pull-left print">Chat</span><a href="javascript:void(0);" class="pull-right" id="closeRight"><i class="fa fa-times"></i></a></h3>
            <div class="slimscroll print">
               <?php if(isset($listOfUsers)){foreach($listOfUsers->result() as $res){?>
               <?php if($this->session->userdata('FirstName')==$res->fIrst_name) { ?>
                      <?php } else { ?>  
                      <a class="print" onClick="javascript:chatWith('<?php echo $res->fIrst_name; ?>');" >
                      <div class="msg-img print">
                          <img class="print" src="<?php echo base_url();?>assets/VisualData/img.jpg" alt="">
                          <p class="msg-name print" >
                          <span style="text-transform: capitalize;"><?php echo $res->fIrst_name;?></span> <br>
                          <small> <?php //if($res->online==1) echo 'Active'; else echo 'Inactive'; ?></small>
                          </p>
                      </div>
                      </a>
                <?php } ?>      
            <?php }}?>          
        </nav>
        <nav class="cbp-spmenu cbp-spmenu-vertical print cbp-spmenu-right" id="cbp-spmenu-s2">
            <h3><span class="pull-left print"><?php echo $this->session->userdata('FirstName').' '.$this->session->userdata('LastName');?></span> <a href="javascript:void(0);" class="pull-right" id="closeRight2"><i class="fa fa-angle-right"></i></a></h3>
		</nav>
        <!-- ENDS HERE -->
        <main class="page-content content-wrap">
            <div class="navbar print">
                <div class="navbar-inner print">
                    <div class="sidebar-pusher">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <div class="logo-box">
                        <a href="" class="logo-text">
                        <img src="<?php echo base_url();?>assets/VisualData/logo.png" width="50" height="45" alt="">
                            <p>Kyber Pakhtunkhwa<br>IT Board</p>
                        </a>
                    </div><!-- Logo Box -->
                    <div class="search-button">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                    </div>
                    <div class="topmenu-outer">
                        <div class="top-menu">
                            <ul class="nav navbar-nav navbar-left"> 
                                <li>		
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic sidebar-toggle"><i class="fa fa-bars"></i></a>
                                </li>
                                <li>		
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic toggle-fullscreen"><i class="fa fa-expand"></i></a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                        <span class="user-name"><?php echo $this->session->userdata('FirstName');?><i class="fa fa-angle-down"></i></span>
                                        <img class="img-circle avatar" src="<?php echo base_url();?>assets/VisualData/<?php echo $this->session->userdata('Picture');?>" width="40" height="40" alt="">
                                    </a>
                                    <ul class="dropdown-menu dropdown-list" role="menu">
                                        <li role="presentation"><a href="<?php echo base_url();?>kpitb_panel/profile"><i class="fa fa-user"></i>Profile</a></li>
                                        <li role="presentation"><a href="<?php echo base_url();?>kpitb_login/log_out"><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
                                    </ul>
                                </li>
                                
                                <li>
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic" id="showRight">
                                        <i class="fa fa-comments"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        </div><!-- Top Menu -->
                    </div>
                </div>
            </div>