<?php

namespace App\Models;

use CodeIgniter\Model;

class UserToken extends Model
{
    protected $table            = 'user_token';
    protected $primaryKey       = 'user_token_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id','token','expired_at'];

    public function findValidToken($token)
    {
        return $this->where('token', $token)
          ->where('expired_at >', date('y-m-d h:i:s'))->first();
    }
}
