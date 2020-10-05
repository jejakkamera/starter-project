<?php (! defined('BASEPATH')) and exit('No direct script access allowed');

class Master_lib {
    private $_ci;
    public function __construct()
    {
        $this->_ci = & get_instance();

    }

    public function master_list($data_h)
    {	
		// $where_=array(
		// 	'module'=>$menu_list
		// );
        // $data_h=$this->_ci->Master_model->ms_list($where_,'tabel');

        
		if($data_h){
            //'coloum'=>'[{"COLUMNS":[{ "data": "nim"},{ "data": "nim"},{ "data": "tahun"}, { "data": "tanggal"},{ "data": "uang_masuk"},{ "data": "cicilan"}, { "data": "action", "orderable":false,"bSearchable": false}]}]'
            //print_r($data_h[0]['code_nama']);
            $coloum='[{"COLUMNS":[{ "data": "'.$data_h[0]['code_nama'].'"},';
            $search_able=array();
            $i=1;
            foreach($data_h as $rows){
                $coloum=$coloum.'{ "data": "'.$rows['code_nama'].'"';
                    if($rows['orderable']==1){
                        $coloum=$coloum.'},';
                        array_push($search_able,$i);
                    }else{
                        $coloum=$coloum.', "orderable":false,"bSearchable": false},';
                    }
                    $i++;
            }
            $coloum=$coloum.']}]';
            $data=array(
                'header'=>$data_h,
                'coloum'=>$coloum,
                'search'=>$search_able,
            );
			return $data;
		}else{
			return null;
		}
    }  

}