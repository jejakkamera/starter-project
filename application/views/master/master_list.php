<link href="<?php echo base_url(); ?>assets/themplate/assets/plugins/datatables/media/css/buttons.dataTables.min.css" id="theme" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/themplate/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/themplate/assets/plugins/summernote/dist/summernote.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/themplate/assets/plugins/datatables24/css/jquery.dataTables.min.css" rel="stylesheet" />
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    
                   
                </div>

 <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title"><?php echo $data_detail['tabel_detail']; ?></h4>
                                <h6 class="card-subtitle"> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>   </h6>
                                <div class="table-responsive m-t-40">
                                
                                <?php
                                if(isset( $data_detail['button_name'])){ ?>
                                <a href="<?php echo $data_detail['button_action_link'] ?>" class="btn btn-success waves-effect waves-light" type="button"><span class="btn-label"><i class="<?php echo $data_detail['button_icon'] ?>"></i></span> <?php echo $data_detail['button_name'] ?></a>
                                <?php } ?>

                                <?php if(isset( $data_detail['button_name2'])){ ?>
                                <a href="<?php echo $data_detail['button_action_link2'] ?>" class="btn btn-primary waves-effect waves-light" type="button"><span class="btn-label"><i class="<?php echo $data_detail['button_icon2'] ?>"></i></span> <?php echo $data_detail['button_name2'] ?></a>
                                <?php } ?>

                                <?php if(isset( $data_detail['button_name3'])){ ?>
                                <a href="<?php echo $data_detail['button_action_link3'] ?>" class="btn btn-info waves-effect waves-light" type="button"><span class="btn-label"><i class="<?php echo $data_detail['button_icon3'] ?>"></i></span> <?php echo $data_detail['button_name3'] ?></a>
                                <?php } ?>

                                <?php if(isset( $data_detail['button_name4'])){ ?>
                                <a href="<?php echo $data_detail['button_action_link4'] ?>" class="btn btn-secondary waves-effect waves-light" type="button"><span class="btn-label"><i class="<?php echo $data_detail['button_icon4'] ?>"></i></span> <?php echo $data_detail['button_name4'] ?></a>
                                <?php } ?>

                                
                                    <table id="mytable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                                        <th>No</th>
                                                        <?php foreach($data_isi['header'] as $val){ ?>
                                                            <th><?php echo $val['nama']; ?></th>
                                                        <?php } ?>


                                                        </tr>
                                        </thead>
                                     
                                        <tbody>
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                       
                    </div>
                </div>
                <!-- ============================================================== -->
                

                  </div>
                  <script src="<?php echo base_url(); ?>assets/themplate/assets/plugins/jquery/jquery.min.js"></script>
                  <script src="<?php echo base_url(); ?>assets/themplate/assets/plugins/datatables24/js/jquery.dataTables.min.js"></script>

                  
    <!-- start - This is for export functionality only -->
    <script src="<?php echo base_url(); ?>assets/themplate/assets/plugins/datatables/media/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/themplate/assets/plugins/datatables/media/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/themplate/assets/plugins/datatables/media/js/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/themplate/assets/plugins/datatables/media/js/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/themplate/assets/plugins/datatables/media/js/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/themplate/assets/plugins/datatables/media/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/themplate/assets/plugins/datatables/media/js/buttons.print.min.js"></script>

    <script type="text/javascript">
            $(document).ready(function() {
                var show=<?php echo '["' . implode('", "', $data_isi['search']) . '"]' ?>;
                //alert(show);
                var dataObject = eval('<?php echo $data_isi['coloum']; ?>');
   
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
                    
                   
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    dom: 'Bfrtip',
                    lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            'pageLength','copy',  'excel', 'pdf', 'print'
        ],
                    // processing: true,
                    // serverSide: true,
                    ajax: {"url": "<?php echo $data_detail['link_json']; ?>", "type": "POST"},
                    "deferRender": true,
                    "columns": dataObject[0].COLUMNS,
                    order: [[0, 'asc']],
                    
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>