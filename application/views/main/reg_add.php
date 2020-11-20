            <!--maincontent-->
            <div class="mainWrap" style="padding-top: 40px;">
                <div class="ui equal width left aligned padded grid stackable">
                    <div class="row">
                        <div class="fifteen wide centered column">
                            <p><h1><?php echo $aksi ?> DATA PROBLEM REGISTER</h1></p>
                            <div class="ui divider"></div>
                            <div class="ui segments">
                                <div class="ui segment">
                                    <h5 class="ui header">
                                        DATA PROMBLEM LOG
                                    </h5>
                                </div>

                                <?php foreach ($get_data as $read){
                                    $Incident_App       = $read->Incident_App;
                                    $Incident_Inc       = $read->Incident_Inc;
                                    $Problem_Class      = $read->Problem_Class;
                                    $Incident_Unit      = $read->Incident_Unit;
                                    $Incident_PIC       = $read->Incident_PIC;
                                    $Incident_PName     = $read->Incident_PName; ?>
                                        
                                    <div class="ui segment">
                                        <table class="ui celled table">
                                            <tr>
                                                <td style="width: 180px;"><label>Aplikasi</label></td>
                                                <td><?php echo $Incident_App; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 180px;"><label>Incident Name</label></td>
                                                <td><?php echo $Incident_Inc; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 180px;"><label>Classification</label></td>
                                                <td><?php echo $Problem_Class; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 180px;"><label>Unit Responsible</label></td>
                                                <td><?php echo $Incident_Unit; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 180px;"><label>PIC</label></td>
                                                <td><?php echo $Incident_PName; ?>/<?php echo $Incident_PIC; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                <?php } ?>
                            </div>

                            <div class="ui segments">
                                <div class="ui segment">
                                    <h5 class="ui header">
                                        FORM <?php echo $aksi ?> DATA PROBLEM REGISTER
                                    </h5>
                                </div>
                                <form id="form1" action="<?php echo $action; ?>" method="post">
                                    <div class="ui segment">
                                        <input type="hidden" name="RegID" value="<?php echo $RegID; ?>">
                                        <input type="hidden" name="ProblemID" value="<?php echo $ProblemID; ?>">
                                        <div class="ui form">
                                            <div class="field">
                                                <label>Root Cause Analysis (RCA)</label>
                                                <textarea placeholder="Root Cause Analysis (RCA)" name="RCA"><?php echo $RCA; ?></textarea>
                                            </div>
                                            <div class="field">
                                                <label>RCA Status</label>
                                                <?php if ($RCA_Status == 'OPEN') {
                                                    $rca1 = '';
                                                    $rca2 = 'selected';
                                                }else{
                                                    $rca1 = 'selected';
                                                    $rca2 = '';
                                                }?>
                                                <select class="ui fluid dropdown" name="RCA_Status" id="RCA_Status">
                                                    <option value="OPEN" <?php echo $rca2;?>>OPEN</option>
                                                    <option value="CLOSE" <?php echo $rca1;?>>CLOSE</option>
                                                </select>
                                            </div>
                                            <div class="field">
                                                <label>Problem Status</label>
                                                <?php if ($Problem_Status == 'OPEN') {
                                                    $prob1 = '';
                                                    $prob2 = 'selected';
                                                }else{
                                                    $prob1 = 'selected';
                                                    $prob2 = '';
                                                }?>
                                                <select class="ui fluid dropdown" name="Problem_Status" id="Problem_Status">
                                                    <option value="OPEN" <?php echo $prob2;?>>OPEN</option>
                                                    <option value="CLOSE" <?php echo $prob1;?>>CLOSE</option>
                                                </select>
                                            </div>
                                            <div class="field">
                                                <label>Tindak Lanjut</label>
                                                <textarea placeholder="Tindak Lanjut" name="Tindak_Lanjut"><?php echo $Tindak_Lanjut; ?></textarea>
                                            </div>
                                            <div class="field">
                                                <label>Date</label>
                                                <input placeholder="Date" name="Reg_Date" type="text" class="datedrop" data-large-mode="true"  data-large-default="true" data-modal="true" data-format="Y/n/d" data-init-set="false" value="<?php echo $Reg_Date; ?>" required>
                                            </div>
                                            <div style="text-align: right;">
                                                <button type="Submit" class="ui primary submit button" >Submit</button>
                                                <button type="Reset" class="ui reset button" >Reset</button>
                                                <a href="<?php echo base_url('manage/problem_reg')?>">
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