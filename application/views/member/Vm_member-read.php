<?php $this->load->view('main/V_Head');?>

<?php $this->load->view('member/Vm_Navbar');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Member</h1>
                </div>
            </div>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($data_member AS $member){ ?>
                                    <tr>
                                        <td><?="$no.";?></td>
                                        <td><?=$member->member_user;?></td>
                                        <td><?=$member->member_nama;?></td>
                                        <td><?=$member->member_alamat;?></td>
                                        <td><?=$member->member_ttl;?></td>
                                        <td><?=$member->member_email;?></td>
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