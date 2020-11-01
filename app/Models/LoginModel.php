<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model {

    protected $table = 'user';

    protected $allowedFields = ['username', 'password', 'firstname', 'lastname'];

    public function check($username, $password) {
        $this->where('username',$username); // where part of the sql SELECT
        $query = $this->get(); // execute SELECT
        $row = $query->getRow(); // get row
        if ($row) { // if row returned based on username
            // check if pw match user given pw
            if (password_verify($password,$row->password)) {
                return $row; // return row
            }
        }
        return null; // null if username/pw incorrect
    }

}
?>