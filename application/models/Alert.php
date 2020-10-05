<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alert extends CI_Model {

    function success($text)
	{
        $sucses='<div class="alert alert-success alert-rounded"> <i class="ti-user"></i> '.$text.' <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
		</div>';
        return $sucses;
    }

    function warning($text)
	{
        $sucses='<div class="alert alert-warning alert-rounded" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-exclamation-triangle"></i> '.$text.'.</div>';
        return $sucses;
    }
    
    function danger($text)
	{
        $sucses='<div class="alert alert-danger alert-rounded" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-exclamation-circle"></i> '.$text.'.</div>';
        return $sucses;
	}

}
