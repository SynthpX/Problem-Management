            <!--maincontent-->
            <div class="mainWrap" style="padding-top: 40px;">
                <div class="ui equal width left aligned padded grid stackable">
                    <div class="row">
                        <div class="fifteen wide centered column">
                            <p><h1>DATA PROBLEM REGISTER</h1></p>
                            <div class="ui divider"></div>
                            <!-- <a href="<?php echo base_url('/manage/problem_reg/problem_add'); ?>">
                                <button class="ui primary button">
                                    <i class="ion-plus icon"></i>
                                    TAMBAH DATA PROBLEM LOG
                                </button>
                            </a> -->
                            <?php echo $this->session->userdata('message1') <> '' ? $this->session->userdata('message1') : ''; ?>
                            <div class="ui segments">
                                <div class="ui segment">
                                    <h5 class="ui header">
                                        TABLE PROBLEM REGISTER
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
                                            <form action='<?php echo base_url('manage/problem_reg/filter_data');?>' method="post">
                                                <div class="ui form">
                                                    <div class="field">
                                                        <label>Tanggal Awal</label>
                                                        <input placeholder="Periode" name="first_date" type="text" class="datedrop" data-large-mode="true"  data-large-default="true" data-modal="true" data-format="Y/n/d" data-init-set="false" required>
                                                    </div>
                                                    <div class="field">
                                                        <label>Tanggal Akhir</label>
                                                        <input placeholder="Periode" name="second_date" type="text" class="datedrop" data-large-mode="true"  data-large-default="true" data-modal="true" data-format="Y/n/d" data-init-set="false" required>
                                                    </div>
                                                    <div class="field">
                                                        <label>RCA Status</label>
                                                        <select class="ui fluid dropdown" name="RCA_Status" id="RCA_Status">
                                                            <option value="OPEN">OPEN</option>
                                                            <option value="CLOSE">CLOSE</option>
                                                        </select>
                                                    </div><div class="field">
                                                        <label>Problem Status</label>
                                                        <select class="ui fluid dropdown" name="Problem_Status" id="Problem_Status">
                                                            <option value="OPEN">OPEN</option>
                                                            <option value="CLOSE">CLOSE</option>
                                                        </select>
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
                                                <th>Services Name</th>
                                                <th>Problem Name</th>
                                                <th>Classification</th>
                                                <th>Unit</th>
                                                <th>PIC</th>
                                                <th>RCA</th>
                                                <th>RCA Status</th>
                                                <th>Problem Status</th>
                                                <th>Tindak Lanjut</th>
                                                <th>Date</th>
                                                <th width="10%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no = 1;
                                            foreach($data_problem as $r){ 
                                            ?>

                                            <tr>
                                                <td style="text-align: center;"><?php echo $no++ ?></td>
                                                <td><?php echo $r->Incident_App ?></td>
                                                <td><?php echo $r->Incident_Inc ?></td>
                                                <td><?php echo $r->Problem_Class ?></td>
                                                <td><?php echo $r->Incident_Unit ?></td>
                                                <td><?php echo $r->Incident_PName ?>/<?php echo $r->Incident_PIC ?></td>
                                                <td><?php echo $r->RCA ?></td>
                                                    <?php if ($r->RCA_Status == 'CLOSE') {
                                                        $rca_st = '<a class="ui red label">CLOSE</a>';
                                                    }else if ($r->RCA_Status == 'OPEN'){
                                                        $rca_st = '<a class="ui green label">OPEN</a>';
                                                    } ?>
                                                <td style="text-align: center;"><?php echo $rca_st ?></td>
                                                    <?php if ($r->Problem_Status == 'CLOSE') {
                                                        $p_st = '<a class="ui red label">CLOSE</a>';
                                                    }else if ($r->Problem_Status == 'OPEN'){
                                                        $p_st = '<a class="ui green label">OPEN</a>';
                                                    } ?>
                                                <td style="text-align: center;"><?php echo $p_st ?></td>
                                                <td><?php echo $r->Tindak_Lanjut ?></td>
                                                <td><?php echo $r->Reg_Date ?></td>
                                                <td style="text-align: center;">
                                                    <a href="<?php echo base_url('/manage/problem_reg/problem_update/'.$r->RegID.''); ?>">
                                                        <button class="ui icon green button">
                                                            <i class="ion-android-create icon"></i>
                                                        </button>
                                                    </a>
                                                    <a href="<?php echo base_url('/manage/problem_reg/problem_delete/'.$r->RegID.''); ?>">
                                                        <button class="ui icon red button">
                                                            <i class="ion-trash-a icon"></i>
                                                        </button>
                                                    </a> 
                                                </td>
                                            </tr>
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
                            title: 'Data Problem Reg '+ status_export,
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'Data Problem Reg '+ status_export,
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Data Problem Reg '+ status_export,
                            orientation: 'landscape',
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
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