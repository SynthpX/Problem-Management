            <!--maincontent-->
            <div class="mainWrap" style="padding-top: 40px;">
                <div class="ui equal width left aligned padded grid stackable">
                    <div class="row">
                        <div class="fifteen wide centered column">
                            <p><h1><?php echo $aksi ?> DATA PROBLEM LOG</h1></p>
                            <div class="ui divider"></div>
                            <div class="ui segments">
                                <div class="ui segment">
                                    <h5 class="ui header">
                                        FORM <?php echo $aksi ?> DATA INCIDENT
                                    </h5>
                                </div>

                                <?php foreach ($get_data as $read){
                                    $Incident_App       = $read->Incident_App;
                                    $Incident_Inc       = $read->Incident_Inc;
                                    $Incident_Periode   = $read->Incident_Periode;
                                    $Incident_Source    = $read->Incident_Source;
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
                                                <td style="width: 180px;"><label>Periode</label></td>
                                                <td><?php echo $Incident_Periode; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 180px;"><label>Source</label></td>
                                                <td><?php echo $Incident_Source; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 180px;"><label>Unit Responsible</label></td>
                                                <td><?php echo $Incident_Unit; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 180px;"><label>PIC</label></td>
                                                <td><?php echo $Incident_PIC; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 180px;"><label>PIC Name</label></td>
                                                <td><?php echo $Incident_PName; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                <?php } ?>
                            </div>

                            <div class="ui segments">
                                <div class="ui segment">
                                    <h5 class="ui header">
                                        FORM <?php echo $aksi ?> DATA PROBLEM LOG
                                    </h5>
                                </div>
                                <form id="form1" action="<?php echo $action; ?>" method="post">
                                    <div class="ui segment">
                                        <input type="hidden" name="ProblemID" value="<?php echo $ProblemID; ?>">
                                        <input type="hidden" name="IncidentID" value="<?php echo $IncidentID; ?>">
                                        <div class="ui form">
                                            <div class="field">
                                                <label>Classification</label>
                                                <input placeholder="Classification" name="Problem_Class" type="text" value="<?php echo $Problem_Class; ?>" required>
                                            </div>
                                            <div class="field">
                                                <label>Problem</label>
                                                <!-- <input placeholder="Problem" name="Problem_Ident" type="text" value="<?php echo $Problem_Ident; ?>" required> -->
                                                <?php
                                                    switch ($Problem_Ident) {
                                                        case 'Y':
                                                            $sel1 = 'selected';
                                                            $sel2 = '';
                                                            $sel3 = '';
                                                            break;
                                                        case 'N':
                                                            $sel1 = '';
                                                            $sel2 = 'selected';
                                                            $sel3 = '';
                                                            break;
                                                        case 'PENDING':
                                                            $sel1 = '';
                                                            $sel2 = '';
                                                            $sel3 = 'selected';
                                                            break;
                                                        
                                                        default:
                                                            $sel1 = '';
                                                            $sel2 = '';
                                                            $sel3 = '';
                                                            break;
                                                    }
                                                ?>
                                                <select class="ui fluid dropdown" name="Problem_Ident" id="Problem_Ident">
                                                    <option value="PENDING" <?php echo $sel3;?>>PENDING</option>
                                                    <option value="N" <?php echo $sel2;?>>NO</option>
                                                    <option value="Y" <?php echo $sel1;?>>YES</option>
                                                </select>
                                            </div>
                                            <div class="field">
                                                <label>Note</label>
                                                <input placeholder="Note" name="Problem_Note" type="text" value="<?php echo $Problem_Note; ?>" required>
                                            </div>
                                            <div class="field">
                                                <label>Keterangan</label>
                                                <textarea placeholder="Keterangan" name="Problem_Ket"><?php echo $Problem_Ket; ?></textarea>
                                            </div>
                                            <div style="text-align: right;">
                                                <button type="Submit" class="ui primary submit button" >Submit</button>
                                                <button type="Reset" class="ui reset button" >Reset</button>
                                                <a href="<?php echo base_url('manage/problem_log')?>">
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