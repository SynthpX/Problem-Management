            <!--maincontent-->
            <div class="mainWrap" style="padding-top: 40px;">
                <div class="ui equal width left aligned padded grid stackable">
                    <div class="row">
                        <div class="fifteen wide centered column">
                            <p><h1>DATA USER</h1></p>
                            <div class="ui divider"></div>
                            <a href="<?php echo base_url('/manage/user/user_add'); ?>">
                                <button class="ui primary button">
                                    <i class="ion-plus icon"></i>
                                    TAMBAH DATA USER
                                </button>
                            </a>
                            <?php echo $this->session->userdata('message1') <> '' ? $this->session->userdata('message1') : ''; ?>
                            <div class="ui segments">
                                <div class="ui segment">
                                    <h5 class="ui header">
                                        TABLE DATA USER
                                    </h5>
                                </div>
                                <div class="ui segment">
                                    <table id="data_table" class="ui compact selectable striped celled table tablet stackable" cellspacing="0" width="100%">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th>NO</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <!-- <th>Password</th> -->
                                                <th>Jabatan</th>
                                                <th>Role</th>
                                                <th width="10%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($makunData as $dataMakun) { ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $dataMakun->User_Name; ?></td>
                                                <td><?php echo $dataMakun->User_Email; ?></td>
                                                <td><?php echo $dataMakun->User_Phone; ?></td>
                                                <!-- <td><?php echo $dataMakun->User_Password; ?></td> -->
                                                <td><?php echo $dataMakun->User_Position; ?></td>
                                                <td><?php echo $dataMakun->User_Role; ?></td>
                                                <td style="text-align: center;">
                                                    <a href="<?php echo base_url('/manage/user/user_update/'.$dataMakun->UserID.''); ?>">
                                                        <button class="ui icon green button">
                                                            <i class="ion-android-create icon"></i>
                                                        </button>
                                                    </a>
                                                    <a href="<?php echo base_url('/manage/user/user_delete/'.$dataMakun->UserID.''); ?>">
                                                        <button class="ui icon red button">
                                                            <i class="ion-trash-a icon"></i>
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
                    buttons: ['colvis']
                } );
                $( "span#export" ).appendTo( "div.left.aligned.eight.column" );
                table.buttons().container()
                .appendTo( $('div.left.aligned.eight.column', table.table().container()) );
            } );
            </script>