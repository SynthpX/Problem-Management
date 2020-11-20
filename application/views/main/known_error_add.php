            <!--maincontent-->
            <div class="mainWrap" style="padding-top: 40px;">
                <div class="ui equal width left aligned padded grid stackable">
                    <div class="row">
                        <div class="fifteen wide centered column">
                            <p><h1>DATA KNOWN ERROR</h1></p>
                            <div class="ui divider"></div>
                            <div class="ui segments">
                                <div class="ui segment">
                                    <h5 class="ui header">
                                        DATA PROMBLEM
                                    </h5>
                                </div>

                                <?php foreach ($get_data as $read){
                                    $Incident_App       = $read->Incident_App;
                                    $Incident_Inc       = $read->Incident_Inc;
                                    $RCA                = $read->RCA;
                                    $Incident_Unit      = $read->Incident_Unit;
                                    $Incident_PIC       = $read->Incident_PIC;
                                    $Incident_PName     = $read->Incident_PName;
                                    $Tindak_Lanjut      = $read->Tindak_Lanjut;
                                    $Reg_Date           = $read->Reg_Date;
                                    $Note               = $read->Note; ?>
                                        
                                    <div class="ui segment">
                                        <table class="ui celled table">
                                            <tr>
                                                <td style="width: 180px;"><label>Services Name</label></td>
                                                <td><?php echo $Incident_App; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 180px;"><label>Problem</label></td>
                                                <td><?php echo $Incident_Inc; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 180px;"><label>Error/Fixing</label></td>
                                                <td><?php echo $RCA; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 180px;"><label>Unit in Charge</label></td>
                                                <td><?php echo $Incident_Unit; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 180px;"><label>Person in Charge</label></td>
                                                <td><?php echo $Incident_PName; ?>/<?php echo $Incident_PIC; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 180px;"><label>Fixing Description (Why, How, Who)</label></td>
                                                <td><?php echo $Tindak_Lanjut; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 180px;"><label>Date</label></td>
                                                <td><?php echo $Reg_Date; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                <?php } ?>
                            </div>

                            <div class="ui segments">
                                <div class="ui segment">
                                    <h5 class="ui header">
                                        FORM KNOWN ERROR
                                    </h5>
                                </div>
                                <form id="form1" action="<?php echo $action; ?>" method="post">
                                    <div class="ui segment">
                                        <input type="hidden" name="KnownID" value="<?php echo $KnownID; ?>">
                                        <input type="hidden" name="RegID" value="<?php echo $RegID; ?>">
                                        <div class="ui form">
                                            <div class="field">
                                                <label>Note</label>
                                                <textarea placeholder="Note" name="Note"><?php echo $Note; ?></textarea>
                                            </div>
                                            <div style="text-align: right;">
                                                <button type="Submit" class="ui primary submit button" >Submit</button>
                                                <button type="Reset" class="ui reset button" >Reset</button>
                                                <a href="<?php echo base_url('manage/known_error')?>">
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