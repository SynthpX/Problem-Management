            <!--maincontent-->
            <div class="mainWrap" style="padding-top: 40px;">
                <div class="ui equal width left aligned padded grid stackable">
                    <div class="row">
                        <div class="fifteen wide centered column">
                            <p><h1>DETAIL DATA INCIDENT LOG</h1></p>
                            <div class="ui divider"></div>
                            <div class="ui segments">
                                <div class="ui segment">
                                    <h5 class="ui header">
                                        DETAIL DATA INCIDENT LOG
                                    </h5>
                                </div>
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

                                    <div style="text-align: right;">
                                        <a href="<?php echo base_url('manage/incident')?>">
                                            <div class="ui black button">Kembali</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--maincontent-->