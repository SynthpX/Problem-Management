            <!--maincontent-->
            <div class="mainWrap" style="padding-top: 40px;">
                <div class="ui equal width left aligned padded grid stackable">
                    <div class="row">
                        <div class="fifteen wide centered column">
                            <p><h1><?php echo $aksi; ?> DATA INCIDENT LOG</h1></p>
                            <div class="ui divider"></div>
                            <div class="ui segments">
                                <div class="ui segment">
                                    <h5 class="ui header">
                                        FORM <?php echo $aksi; ?> DATA INCIDENT LOG
                                    </h5>
                                </div>
                                <form action="<?php echo $action ?>" method="post">
                                    <div class="ui segment">
                                        <input type="hidden" name="UserID" value="<?php echo $UserID; ?>">
                                        <div class="ui form">
                                            <div class="field">
                                                <label>Username</label>
                                                <input placeholder="Username" name="User_Name" value="<?php echo $User_Name; ?>" type="text">
                                            </div>
                                            <div class="field">
                                                <label>Email</label>
                                                <input placeholder="Email" name="User_Email" value="<?php echo $User_Email; ?>" type="text">
                                            </div>
                                            <div class="field">
                                                <label>Phone</label>
                                                <input placeholder="Phone" name="User_Phone" value="<?php echo $User_Phone; ?>" type="text">
                                            </div>
                                            <div class="field">
                                                <label>Password</label>
                                                <input placeholder="Password" name="User_Password" value="<?php echo $User_Password; ?>" type="Password">
                                            </div>
                                            <div class="field">
                                                <label>Position</label>
                                                <input placeholder="Position" name="User_Position" value="<?php echo $User_Position; ?>" type="text">
                                            </div>
                                            <div class="field">
                                                <label>Role</label>
                                                <input placeholder="Role" name="User_Role" value="<?php echo $User_Role; ?>" type="text">
                                            </div>
                                            <div style="text-align: right;">
                                                <button type="Submit" class="ui primary submit button" >Submit</button>
                                                <button type="Reset" class="ui reset button" >Reset</button>
                                                <a href="<?php echo base_url('manage/user')?>">
                                                    <div class="ui black button">Cancel</div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--maincontent-->