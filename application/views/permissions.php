<?php 
    $this->load->view('parts/header');
    $this->load->view('parts/head_msgs');
?>
            <!-- Navbar -->
            <?php $this->load->view('parts/sidemenu')?>
            <!-- Page Sidebar -->
            <div class="page-inner">
                <div id="main-wrapper">
                <div class="col-lg-12 col-md-12">
                    <div class="panel info-box panel-white">
                        <div class="panel-body bread">
                            <h2 class="NoPadTop">Permissions</h2>
                            <div class="page-breadcrumb">
                                <ol class="breadcrumb">
                                    <li><a href="kpitb_panel/index">Dashboard</a></li>
                                    <li><a href="#">Permissions</a></li>
                                </ol>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <h3 class=" alert alert-success">Assigned Permissions</h3>
                            
                            <form action="<?php echo base_url(); ?>staff/insert_permissions" id="form1" method="post">
                            <div class="col-lg-12">
                                <?php $not_assign = true; ?>
                                <?php foreach($permissions as $permission) { ?>
                                <?php if($permission->flage) { ?>
                                 <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="checkbox" value="<?php echo $permission->p_id; ?>" checked>
                                        <label for=""><?php echo $permission->name; ?></label>
                                    </div>
                                </div>
                                <?php }else{ if($not_assign){ $not_assign = false; ?>
                                
                                </div>
                                <div class="clearfix"></div>
                                <hr>
                                        <h3 class="alert alert-danger">Not Assigned Permissions</h3>
                                    
                                <?php } ?>
                                 <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="checkbox" value="<?php echo $permission->p_id; ?>">
                                        <label for=""><?php echo $permission->name; ?></label>
                                    </div>
                                </div>
                                <?php }} ?>
                                
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="col-lg-12 col-lg-offset-8">
                                <input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>">
                                <input type="hidden" name="permissions" id="permissions_input">
                                <button class="btn btn-primary" type="button" onclick="submit_form();">Save Change</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="page-footer">
                    <p class="no-s">2015 &copy; Rights Reserved: Kyber PakhtunKhwa IT Board Peshawar</p>
                </div>
            </div>
            <!-- Page Inner -->
        </main><!-- Page Content -->


        <script>
        function submit_form()
        {
            var form_array = [];
            var form1 = document.getElementById('form1');
            for(var item=0; item <= form1.length-4; item++)
            {
                if(form1[item].checked)
                {
                    form_array.push({'id':form1[item].getAttribute('value')});
                    console.log(form1[item].getAttribute('value'));
                }
                else
                {
                    console.log(form1[item]);
                }
            }
            document.getElementById('permissions_input').value = JSON.stringify(form_array);
            console.log(document.getElementById('permissions_input').value);
            form1.submit();

        }
        </script>
<?php $this->load->view('parts/footer');?>