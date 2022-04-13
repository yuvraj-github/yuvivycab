<?php

namespace App\Models;

use CodeIgniter\Model;

class DocumentModel extends Model
{
    public $db;
    public $docList;
    public $docMaster;
    public function __construct()
    {
        $this->db = db_connect();
        $this->docList = 'document_list';
        $this->docMaster = 'document_master';
    }
    public function getDocsList($countryCode='', $docUserType='') {
        $data = [];
        $sql = "SELECT dm.*,dl.doc_id, dl.doc_userid, dl.ex_date, dl.doc_file from $this->docMaster as dm LEFT JOIN $this->docList as dl 
                ON dl.doc_masterid = dm.doc_masterid where dm.doc_usertype = '$docUserType' 
                AND dm.country = '$countryCode' AND dm.status='Active'";
        $query = $this->db->query($sql);
        $rows = $query->getResult();
        foreach ($rows as $row) {
            $data[] = $row;
        }
        return $data;
    }   
    public function saveDocFile($data)
    {
        return $this->db->table($this->docList)->insert($data);       
    }
    public function getDocMasterDetails($docMasterID)
    {
        $sql = "SELECT dm.*,dl.doc_id, dl.doc_userid, dl.ex_date, dl.doc_file from $this->docMaster as dm LEFT JOIN $this->docList as dl 
                ON dl.doc_masterid = dm.doc_masterid where dm.doc_masterid = $docMasterID";
        $query = $this->db->query($sql);
        $row = $query->getRow();
        return $row;
    }
    public function updateDocFile($data, $docID)
    {
        return $this->db->table($this->docList)->update($data, ['doc_id  ' => $docID]);
    }
}
