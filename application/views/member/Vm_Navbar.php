        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url('member/C_Member');?>">Users Management System</a>
            </div>
            <!-- /.navbar-header -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo site_url('member/C_Member');?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('member/C_Member/read_member');?>"><i class="fa fa-users fa-fw"></i> Members</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('member/C_Member/profile_member/'.$this->session->userdata('member_id').'') ;?>"><i class="fa fa-user fa-fw"></i> Profile</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('C_Main/logout');?>"><i class="fa fa-edit fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>