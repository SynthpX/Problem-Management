            <!--maincontent-->
            <div class="mainWrap" style="padding-top: 40px;">
                <div class="ui equal width left aligned padded grid stackable">
                    <div class="row">
                        <div class="fifteen wide centered column">
                            <p><h1>DATA PROBLEM LOG</h1></p>
                            <div class="ui divider"></div>
                            <!-- <a href="<?php echo base_url('/manage/problem/problem_add'); ?>">
                                <button class="ui primary button">
                                    <i class="ion-plus icon"></i>
                                    TAMBAH DATA PROBLEM LOG
                                </button>
                            </a> -->
                            <?php echo $this->session->userdata('message1') <> '' ? $this->session->userdata('message1') : ''; ?>
                            <div class="ui segments">
                                <div class="ui segment">
                                    <h5 class="ui header">
                                        TABLE PROBLEM LOG
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
                                            <form action='<?php echo base_url('manage/problem_log/filter_data');?>' method="post">
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
                                                        <label>Problem Status</label>
                                                        <select class="ui fluid dropdown" name="Ident" id="Ident">
                                                            <option value="Y">YES</option>
                                                            <option value="N">NO</option>
                                                            <option value="PENDING">PENDING</option>
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
                                                <th>Incident Name</th>
                                                <th>Source</th>
                                                <th>Periode</th>
                                                <th>Classification</th>
                                                <th>Problem</th>
                                                <th>Note</th>
                                                <th>Keterangan</th>
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
                                                <td><?php echo $r->Incident_Source ?></td>
                                                <td><?php echo $r->Incident_Periode ?></td>
                                                <td><?php echo $r->Problem_Class ?></td>
                                                <?php if ($r->Problem_Ident == 'N') {
                                                    $p_st = '<a class="ui red label">N</a>';
                                                }else if ($r->Problem_Ident == 'PENDING'){
                                                    $p_st = '<a class="ui yellow label">PENDING</a>';
                                                }else{
                                                    $p_st = '<a class="ui blue label">Y</a>';
                                                } ?>
                                                <td style="text-align: center;"><?php echo $p_st ?></td>
                                                <td><?php echo $r->Problem_Note ?></td>
                                                <td><?php echo $r->Problem_Ket ?></td>
                                                <td style="text-align: center;">
                                                    <a href="<?php echo base_url('/manage/problem_log/problem_update/'.$r->ProblemID.''); ?>">
                                                        <button class="ui icon green button">
                                                            <i class="ion-android-create icon"></i>
                                                        </button>
                                                    </a>
                                                    <a href="<?php echo base_url('/manage/problem_log/problem_delete/'.$r->ProblemID.''); ?>">
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
                            title: 'Data Problem Log '+ status_export,
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'Data Problem Log '+ status_export,
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Data Problem Log '+ status_export,
                            orientation: 'landscape',
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
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