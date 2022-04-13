<?php

namespace App\Models;

use CodeIgniter\Model;

class UserWalletModel extends Model
{
    public $db;
    public $table;
    public function __construct()
    {
        $this->db = db_connect();
        $this->table = 'user_wallet';
    }
    public function saveWalletBalance($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function updateWalletBalance($iUserWalletID, $iBalance)
    {
        $sql = "UPDATE $this->table SET iBalance = iBalance + $iBalance WHERE iUserWalletID = $iUserWalletID";
        return $query = $this->db->query($sql);
    }
}
