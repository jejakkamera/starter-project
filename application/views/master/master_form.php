
<link href="<?php echo base_url(); ?>assets/themplate/assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/themplate/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/themplate/assets/plugins/summernote/dist/summernote.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/themplate/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/themplate/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/themplate/assets/plugins/select2/dist/js/select2.min.js"></script>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    
                   
                </div>
                <div class="row">
                    <div class="col-lg-12">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>   
                        <div class="card card-outline-danger">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"><?php echo $data_detail['form_detail']; ?></h4>
                            </div>
                            <div class="card-block">
                            <form action="<?php echo $data_detail['action']; ?>" method="post" enctype="multipart/form-data" >
                            <?php foreach($data_isi as $val){ ?>
                                <div class="form-group row">
                          <label class="col-sm-3 form-control-label"><?php echo $val['nama_form']; ?></label>
                          <div class="col-sm-9">
                          <?php 
                          $input_ = array("text", "password", "number","hidden");
                          $input_float = array("float");
                          $input_tags = array("tags");
                          $input_wyswyg = array("wyswyg");
                          $input_date = array("date");
                          $input_select = array("select");
                          $input_select2 = array("select2");
                          $input_upload = array("upload");
                          if(in_array($val['tipe'], $input_)){ ?>

                            <input type="<?php echo $val['tipe']; ?>" class="form-control" name="<?php echo $val['kode_form']; ?>" id="<?php echo $val['kode_form']; ?>" placeholder="<?php echo $val['placeholder']; ?>" 
                            <?php  if($val['required']==1){ echo "required";  }?> <?php  if($val['readonly']==1){ echo "readonly";  }?> value="<?php if($status && $data_master){   echo $data_master[$val['kode_form']];}else{ echo set_value($val['kode_form']); }
                            ?>" >

                           <?php }else if(in_array($val['tipe'], $input_float)){ ?>

                            <input type="number" step="0.01"class="form-control" name="<?php echo $val['kode_form']; ?>" id="<?php echo $val['kode_form']; ?>" placeholder="<?php echo $val['placeholder']; ?>" 
                            <?php  if($val['required']==1){ echo "required";  }?> <?php  if($val['readonly']==1){ echo "readonly";  }?> value="<?php if($status && $data_master){   echo $data_master[$val['kode_form']];}else{ echo set_value($val['kode_form']); }
                            ?>" >

                           <?php }else if(in_array($val['tipe'], $input_upload)){ ?>

                            <input type="file" class="form-control" name="<?php echo $val['kode_form']; ?>" id="<?php echo $val['kode_form']; ?>" placeholder="<?php echo $val['placeholder']; ?>" 
                            <?php  if($val['required']==1){ echo "required";  }?> <?php  if($val['readonly']==1){ echo "readonly";  }?> value="<?php if($status && $data_master){   echo $data_master[$val['kode_form']];}else{ echo set_value($val['kode_form']); }
                            ?>" >
                           <?php echo "Last Upload  : "; ?>
                           <?php }else if(in_array($val['tipe'], $input_tags)){ ?>
                            
                           
                                
                            <input  type="text" class="form-control" name="<?php echo $val['kode_form']; ?>" id="<?php echo $val['kode_form']; ?>" <?php  if($val['readonly']==1){ echo "readonly";  }?>   data-role="tagsinput" placeholder="<?php echo $val['placeholder']; ?>" <?php  if($val['required']==1){ echo "required";  }?> value="<?php if($status && $data_master){   echo $data_master[$val['kode_form']];}else{ echo set_value($val['kode_form']); }
                            ?>" />

                       <?php }else if(in_array($val['tipe'], $input_wyswyg)){ ?>
                            <textarea <?php  if($val['required']==1){ echo "required";  }?>  class="summernote" name="<?php echo $val['kode_form']; ?>" id="<?php echo $val['kode_form']; ?>">
                            <?php if($status && $data_master){   echo $data_master[$val['kode_form']];}else{ echo set_value($val['kode_form']); }
                            ?>
                            </textarea>
                      
                                
                       <?php }else if(in_array($val['tipe'], $input_date)){ ?>
                            
                        <input type="text" <?php  if($val['required']==1){ echo "required";  }?> name="<?php echo $val['kode_form']; ?>" id="<?php echo $val['kode_form']; ?>" class="form-control mydatepicker" placeholder="yyyy-mm-dd" <?php  if($val['readonly']==1){ echo "readonly";  }?> value="<?php if($status && $data_master){   echo $data_master[$val['kode_form']];}else{ echo set_value($val['kode_form']); }
                            ?>">
                        <span class="input-group-addon" ><i class="icon-calender"></i></span>
                                
                       <?php }else if(in_array($val['tipe'], $input_select)){ ?>
                            
                        <select <?php  if($val['required']==1){ echo "required";  }?> <?php  if($val['readonly']==1){ echo "disabled";  }?> name="<?php echo $val['kode_form']; ?>" id="<?php echo $val['kode_form']; ?>" require class="js-data-example-ajax-<?php echo $val['kode_form']; ?> form-control" style="width: 100%">
 
                           <?php foreach($val['select_data'] as $row){ ?>
                                <option value="<?php echo $row['id']; ?>" <?php if($status && $data_master){ if($data_master[$val['kode_form']]==$row['id']){ echo 'selected="selected"'; } } ?> ><?php echo $row['value']; ?></option>;
                            <?php }?>
                      
                        </select>

                       <?php }else if(in_array($val['tipe'], $input_select2)){ 
                       ?>
                            
                        <select <?php  if($val['readonly']==1){ echo "disabled";  }?> <?php  if($val['required']==1){ echo "required";  }?> name="<?php echo $val['kode_form']; ?>" id="<?php echo $val['kode_form']; ?>" require class="js-data-example-ajax-<?php echo $val['kode_form']; ?> form-control" style="width: 100%">
                        <?php if($status && $data_master){ echo '
                        <option value="'.$data_master[$val['kode_form']].'" selected="selected">'.$data_master['nama_'.$val['kode_form']].'</option>';
                            }else{ }?>
                       
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
                            
                            <?php if($status=='update'){  ?>

                            $(".js-data-example-ajax-<?php echo $val['kode_form']; ?>").val('<?php echo $data_master[$val['kode_form']]; ?>'); 
                            $(".js-data-example-ajax-<?php echo $val['kode_form']; ?>").trigger('change');
                            
                            <?php }  ?>


                            } );

            </script>
                            
                      <?php } ?>


                            </div>
                        </div>
                                                        <?php } ?>


                        

                        

                        
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <span class="btn-label"><i class="fa fa-check"></i></span> Proses</button>
                                        <?php if(isset( $data_detail['add_action'])){ ?>
                                            <a href="<?php echo $data_detail['add_action_url'] ?>" class="btn btn-info" type="button"><span class="btn-label"></span><?php echo $data_detail['add_action'] ?></a>
                                        <?php } ?>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
               
            </div>
            <script src="<?php echo base_url(); ?>assets/themplate/assets/plugins/summernote/dist/summernote.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/themplate/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script>
    jQuery(document).ready(function() {

        $('.summernote').summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false, // set focus to editable area after initializing summernote
            placeholder: 'type hire',
        });

        $('.inline-editor').summernote({
            airMode: true
        });

    });

    window.edit = function() {
            $(".click2edit").summernote()
        },
        window.save = function() {
            $(".click2edit").summernote('destroy');
        }

    jQuery('.mydatepicker, #datepicker').datepicker({ format: 'yyyy-mm-dd' });
    </script>

  
