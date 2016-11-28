<?php $this->load->view('main/V_Head');?>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" align="center">Register Member</h3>
                    </div>
                    <div class="panel-body">
                    <font color="red"><?php echo validation_errors();?></font>
                        <?php echo form_open("C_Main/register"); ?>
                            <fieldset>
                                <div class="form-group">
                                    <label class="control-label" for="username">Username (Without Space)</label>
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="username">Full Name</label>
                                    <input class="form-control" placeholder="Full Name" name="fullname" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="username">Address</label>
                                    <input class="form-control" placeholder="Address" name="address" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="username">Date of Birth (dd-mm-yyyy)</label>
                                    <input class="form-control" placeholder="Date of Birth" name="birthdate" type="date" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="username">E-mail</label>
                                    <input class="form-control" placeholder="E-mail" name="email" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="username">Password</label>
                                    <input class="form-control" placeholder="Password" name="password" type="password" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="username">Confirm Password</label>
                                    <input class="form-control" placeholder="Confirm Password" name="passconf" type="password" required>
                                </div>
                                <input type="submit" class="btn btn-lg btn-success btn-block";>
                            </fieldset>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $this->load->view('main/V_Script');?>
</body>

</html>