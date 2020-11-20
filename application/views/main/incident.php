            <!--maincontent-->
            <div class="mainWrap" style="padding-top: 40px;">
                <div class="ui equal width left aligned padded grid stackable">
                    <div class="row">
                        <div class="fifteen wide centered column">
                            <p><h1>DATA INCIDENT LOG</h1></p>
                            <div class="ui divider"></div>
                            <a href="<?php echo base_url('/manage/incident/incident_add'); ?>">
                                <button class="ui primary button">
                                    <i class="ion-plus icon"></i>
                                    TAMBAH DATA INCIDENT LOG
                                </button>
                            </a>
                            <?php echo $this->session->userdata('message1') <> '' ? $this->session->userdata('message1') : ''; ?>
                            <div class="ui segments">
                                <div class="ui segment">
                                    <h5 class="ui header">
                                        TABLE INCIDENT LOG
                                    </h5>
                                </div>
                                <div class="ui segment">
                                    <!--Filter data-->
                                    <div align="center">
                                        <div class="center ui styled accordion">
                                          <div class="active title">
                                            <i class="dropdown icon"></i>
                                            Filter Data
                                          </div>
                                          <div class="content">
                                            <form action='<?php echo base_url('manage/incident/filter_data');?>' method="post">
                                                <div class="ui form">
                                                    <div class="field">
                                                        <label>Tanggal Awal</label>
                                                        <input placeholder="Periode" name="first_date" type="text" class="datedrop" data-large-mode="true"  data-large-default="true" data-modal="true" data-format="Y/n/d" data-init-set="false" required>
                                                    </div>
                                                    <div class="field">
                                                        <label>Tanggal Akhir</label>
                                                        <input placeholder="Periode" name="second_date" type="text" class="datedrop" data-large-mode="true"  data-large-default="true" data-modal="true" data-format="Y/n/d" data-init-set="false" required>
                                                    </div>
                                                    <div style="text-align: right;">
                                                        <button type="Submit" class="ui primary submit button" >Filter</button>
                                                    </div>
                                                </div>
                                            </form>
                                          </div>
                                        </div>
                                    </div>
                                    
                                    <br>
                                    <table id="data_table" class="ui compact selectable striped celled table tablet stackable" cellspacing="0" width="100%">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th>NO</th>
                                                <th>Aplikasi</th>
                                                <th>Incident</th>
                                                <th>Periode</th>
                                                <th>Source</th>
                                                <th>Unit Responsible</th>
                                                <th>PIC</th>
                                                <th>PIC</th>
                                                <th width="10%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($incidentData as $dataIncident) { ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $dataIncident->Incident_App; ?></td>
                                                <td><?php echo $dataIncident->Incident_Inc; ?></td>
                                                <td><?php echo $dataIncident->Incident_Periode; ?></td>
                                                <td><?php echo $dataIncident->Incident_Source; ?></td>
                                                <td><?php echo $dataIncident->Incident_Unit; ?></td>
                                                <td><?php echo $dataIncident->Incident_PIC; ?></td>
                                                <td><?php echo $dataIncident->Incident_PName; ?></td>
                                                <td style="text-align: center;">
                                                    <a href="<?php echo base_url('/manage/incident/incident_update/'.$dataIncident->IncidentID.''); ?>">
                                                        <button class="ui icon green button">
                                                            <i class="ion-android-create icon"></i>
                                                        </button>
                                                    </a>
                                                    <a href="<?php echo base_url('/manage/incident/incident_delete/'.$dataIncident->IncidentID.''); ?>">
                                                        <button class="ui icon red button">
                                                            <i class="ion-trash-a icon"></i>
                                                        </button>
                                                    </a>
                                                    <a href="<?php echo base_url('/manage/incident/incident_detail/'.$dataIncident->IncidentID.''); ?>">
                                                        <button class="ui icon blue button">
                                                            <i class="unhide icon"></i>
                                                        </button>
                                                    </a>   
                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--maincontent-->
            <script> 
            
            var filter_mode = "<?php echo $first_date;?>";
            var export_date = '<?php echo $first_date;?>-<?php echo $second_date;?>';
            var semua_data = "full";
            var status_export;
            
            if(filter_mode == ""){
                status_export = semua_data;
            }else{
                status_export = export_date;
            }
            
            
            $(document).ready(function() {
                var table = $('#data_table').DataTable( {
                    dom: "<'ui stackable grid'"+
                        "<'row'"+
                            "<'eight wide column'l>"+
                            "<'right aligned eight wide column'f>"+
                        ">"+
                        "<'row dt-table'"+
                            "<'sixteen wide column'tr>"+
                        ">"+
                        "<'row'"+
                            "<'left aligned eight wide column'>"+
                            "<'right aligned eight wide column'pi>"+
                        ">"+
                    ">",
                    buttons: [
                        {
                            extend: 'print',
                            title: 'Data Incident Log '+ status_export,
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'Data Incident Log '+ status_export,
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Data Incident Log '+ status_export,
                            orientation: 'landscape',
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                            }
                        },
                        'colvis'
                    ]
                } );
                $( "span#export" ).appendTo( "div.left.aligned.eight.column" );
                table.buttons().container()
                .appendTo( $('div.left.aligned.eight.column', table.table().container()) );
            } );
            </script>
        