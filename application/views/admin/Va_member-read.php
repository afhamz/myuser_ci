<?php $this->load->view('main/V_Head');?>

<?php $this->load->view('admin/Va_Navbar');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Member</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <a href="<?php echo site_url('admin/C_Admin/create_member');?>" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Add data
                    </a>
                </div>
            </div>
            <br>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Member List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Username</th>
                                        <th>Member Name</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Birth Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($data_member AS $member){ ?>
                                    <tr>
                                        <td><?="$no.";?></td>
                                        <td><?=$member->member_user;?></td>
                                        <td><?=$member->member_nama;?></td>
                                        <td><?=$member->member_alamat;?></td>
                                        <td><?=$member->member_email;?></td>
                                        <td><?=$member->member_ttl;?></td>
                                        <td>
                                            <a href="<?=site_url('admin/C_Admin/update_member/'.$member->member_id);?>"><i class="fa fa-edit fa-fw" style="color: green;"></i></a>
                                            &nbsp;|&nbsp;
                                            <a href="<?=site_url('admin/C_Admin/delete_member/'.$member->member_id);?>" onClick="return doconfirm();"><i class="fa fa-trash fa-fw" style="color: red;"></i></a>
                                        </td>
                                    </tr>
                                    <?php $no++; } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php $this->load->view('main/V_Script');?>