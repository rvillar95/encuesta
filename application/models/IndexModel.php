<?php

defined('BASEPATH') or exit('No direct script access allowed');

class IndexModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function test(){
        $sql = "insert into test () values ()";
        return $this->db->query($sql);
    }

}
