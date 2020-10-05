<link href="<?php echo base_url(); ?>assets/themplate/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/themplate/assets/plugins/select2/dist/js/select2.min.js"></script>

                <div class="row">
                    <!-- Column -->
                    
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-12 ">
                        <div class="card">
                        
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Filter Data</button>

                        </div>
                    </div>
                    <!-- Column -->
                </div>
  
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?php echo $data_detail['form_detail']; ?> (Filter : <?php echo $data_filter; ?>)</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo $data_detail['action']; ?>" method="post" enctype="multipart/form-data" >
                            <?php foreach($data_isi as $val){ ?>
                            <?php 
                            $input_ = array("text", "password", "number","hidden");
                            $input_tags = array("tags");
                            $input_wyswyg = array("wyswyg");
                            $input_date = array("date");
                            $input_select = array("select");
                            $input_select2 = array("select2");
                            $input_upload = array("upload"); ?>
                            
                            <?php if(in_array($val['tipe'], $input_)){ ?>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label"><?php echo $val['nama_form']; ?></label>
                                <input type="text" name="<?php echo $val['kode_form']; ?>" id="<?php echo $val['kode_form']; ?>" class="form-control" id="recipient-name">
                            </div>

                            <?php }else if(in_array($val['tipe'], $input_select)){ ?>
                                <label for="recipient-name" class="col-form-label"><?php echo $val['nama_form']; ?></label>
                                <select  name="<?php echo $val['kode_form']; ?>" id="<?php echo $val['kode_form']; ?>" class="js-data-example-ajax-<?php echo $val['kode_form']; ?> form-control" style="width: 100%">
                                <option value="" >-</option>
                                <?php foreach($val['select_data'] as $row){ ?>
                                        <option value="<?php echo $row['id']; ?>" ><?php echo $row['value']; ?></option>;
                                    <?php }?>
                            
                                </select>

                            <?php }else if(in_array($val['tipe'], $input_select2)){ ?>
                            
                                <label for="recipient-name" class="col-form-label"><?php echo $val['nama_form']; ?></label>
                        <select name="<?php echo $val['kode_form']; ?>" id="<?php echo $val['kode_form']; ?>" require class="js-data-example-ajax-<?php echo $val['kode_form']; ?> form-control" style="width: 100%">
                        </select>
                                
                        <script type="text/javascript">
                                $(document).ready(function() {

                                $('.js-data-example-ajax-<?php echo $val['kode_form']; ?>').select2({
                                        ajax: {
                                            url: '<?php echo $val['select_data']; ?>',
                                            dataType: 'json',
                                            method : "POST",
                                            data : function(params){
                                                return{
                                                    kec : params.term  
                                                };
                                            },
                                        processResults: function(data){
                                            var result = [];
                                            $.each(data, function(index,item){
                                                result.push({
                                                    id : item.kode,
                                                    text : item.nama
                                                });
                                            });
                                            return{
                                                results:result
                                            };
                                            
                                        }
                                            
                                        
                                    }
                        
                            } );


                            } );

            </script>
                            
                      <?php } ?>
                            <hr>
                            <?php } ?>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success"> <span class="btn-label"><i class="fa fa-check"></i></span> Proses</button></form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
                        </div>
                        </div>
                    </div>
                    </div>

<script>
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal

})
</script>