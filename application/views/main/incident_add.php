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
                                        <input type="hidden" name="IncidentID" value="<?php echo $IncidentID; ?>">
                                        <div class="ui form">
                                            <div class="field">
                                                <label>Aplikasi</label>
                                                <input placeholder="Aplikasi" name="Incident_App" value="<?php echo $Incident_App; ?>" type="text" required>
                                            </div>
                                            <div class="field">
                                                <label>Incident</label>
                                                <input placeholder="Incident" name="Incident_Inc" value="<?php echo $Incident_Inc; ?>" type="text" required>
                                            </div>
                                            <div class="field">
                                                <label>Periode</label>
                                                <input placeholder="Periode" name="Incident_Periode" type="text" class="datedrop" data-large-mode="true"  data-large-default="true" data-modal="true" data-format="Y/n/d" data-init-set="false" value="<?php echo $Incident_Periode; ?>" required>
                                            </div>
                                            <div class="field">
                                                <label>Source</label>
                                                <input placeholder="Source" name="Incident_Source" value="<?php echo $Incident_Source; ?>" type="text" required>
                                            </div>
                                            <div class="field">
                                                <label>Unit Responsible</label>
                                                <input placeholder="Unit Responsible" name="Incident_Unit" value="<?php echo $Incident_Unit; ?>" type="text" required>
                                            </div>
                                            <div class="field">
                                                <label>PIC</label>
                                                <input placeholder="PIC" name="Incident_PIC" value="<?php echo $Incident_PIC; ?>" type="text" required>
                                            </div>
                                            <div class="field">
                                                <label>PIC Name</label>
                                                <input placeholder="PIC_Name" name="Incident_PName" value="<?php echo $Incident_PName; ?>" type="text" required>
                                            </div>
                                            <div style="text-align: right;">
                                                <button type="Submit" class="ui primary submit button" >Submit</button>
                                                <button type="Reset" class="ui reset button" >Reset</button>
                                                <a href="<?php echo base_url('manage/incident')?>">
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