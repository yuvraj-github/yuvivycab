<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyModel extends Model
{
    protected $table = 'company';
    protected $primaryKey = 'iCompanyId ';
    protected $allowedFields = ['*'];
    public function saveCompanyDetails($data)
    {
        return $this->db->table('company')->insert($data);
        // $query = $this->db->getLastQuery();  
        // return $query->getQuery();
    }
    public function emailAlreadyExists($email, $companyID)
    {
        if ($companyID != '') {
            $sql = "SELECT * FROM $this->table WHERE vEmail='$email' AND iCompanyId <> $companyID";
        } else {
            $sql = "SELECT * FROM $this->table WHERE vEmail='$email'";
        }
        $query = $this->db->query($sql);
        $row = $query->getRow();
        return $row;
    }
    public function getAll($criteria)
    {
        $sort = 'iCompanyId';
        $order = 'DESC';
        $like = [];
        $orLike = [];
        $where = [];
        if ($criteria['sort-by'] != '') {
            $sort = $this->_prepareSort($criteria['sort-by']);
            $order = $this->_prepareOrder($criteria['order']);
        }
        if ($criteria['option'] != '' && $criteria['option'] != 'MobileNumber') {
            $option = $criteria['option'];
            if ($criteria['keyword'] != '') {
                $keyword = strtolower($criteria['keyword']);
                $like = [$option => $keyword];
            }
        }
        if ($criteria['option'] == 'MobileNumber') {
            $keyword = $criteria['keyword'];
            $like = ["concat(`vCode`,'',`vPhone`)" => $keyword];
        }
        if ($criteria['eStatus'] != '') {
            $where['eStatus'] = $criteria['eStatus'];
        }
        if ($criteria['vCountry'] != '') {
            $where['vCountry'] = $criteria['vCountry'];
        }
        if ($criteria['vState'] != '') {
            $where['vState'] = $criteria['vState'];
        }
        if ($criteria['vCity'] != '') {
            $where['vCity'] = $criteria['vCity'];
        }
        if ($criteria['option'] == '' && $criteria['keyword'] != '') {
            $orLike = [
                'vCompany' => strtolower($criteria['keyword']),
                'vEmail' => strtolower($criteria['keyword']),
                "concat(`vCode`,'',`vPhone`)" => $criteria['keyword']
            ];
        }
        $query = $this->table($this->table)
            ->select('*')
            ->like($like)
            ->orLike($orLike)
            ->where($where)
            ->orderBy($sort, $order)
            ->paginate(20);
        return $query;
        //$query = $this->db->getLastQuery(); 
        //echo $query;die;
        //return $query->getQuery();   

    }
    public function updateStatus($companyID, $actionStatus)
    {
        return $this->db->table($this->table)->update(['eStatus' => $actionStatus], ['iCompanyId ' => $companyID]);
    }
    public function getCompanyDetails($companyID)
    {
        $sql = "select * from $this->table where iCompanyId  = $companyID";
        $query = $this->db->query($sql);
        $row = $query->getRow();
        return $row;
    }
    public function updateCompanyDetails($data, $companyID)
    {
        return $this->db->table($this->table)->update($data, ['iCompanyId ' => $companyID]);
    }
    public function deleteCompany($companyID)
    {
        $sql = "DELETE from $this->table where iCompanyId  = $companyID";
        return $query = $this->db->query($sql);
    }
    private function _prepareSort($sort)
    {
        $array = [
            'iCompanyId '    => 'iCompanyId ',
            'vCompany'       => 'vCompany',
            'vEmail'         => 'vEmail',
            'eStatus'        => 'eStatus'
        ];
        if (array_key_exists($sort, $array)) {
            return $array[$sort];
        }
        return 'iCompanyId';
    }
    private function _prepareOrder($order)
    {
        $array = ['asc', 'desc'];
        if (in_array($order, $array)) {
            return $order;
        }
        return 'desc';
    }
    public function getAllCompanies()
    {
        $data = [];
        $sql = "SELECT * FROM $this->table WHERE eStatus = 'Active' ORDER BY  vCountry ASC";
        $query = $this->db->query($sql);
        $rows = $query->getResult();
        foreach ($rows as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
