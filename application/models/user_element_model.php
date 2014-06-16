<?php 

class User_Element_model extends CI_Model {

    /**
     * @name string TABLE_NAME Holds the name of the table in use by this model
     */
    const TABLE_NAME = 'users_elements';
    
    /**
     * Inserts new data into database
     *
     * @param Array $data Associative array with field_name=>value pattern to be inserted into database
     * @return mixed Inserted row ID, or false if error occured
     */
    public function insert(Array $data) {       
        if ($this->db->insert(self::TABLE_NAME, $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    /**
     * Retrieves record(s) from the database as an array
     *
     * @param mixed $where Optional. Retrieves only the records matching given criteria, or all records if not given.
     *                      If associative array is given, it should fit field_name=>value pattern.
     *                      If string, value will be used to match against PRI_INDEX
     * @return mixed Single record if ID is given, or array of results
     */
    public function get_array($where = NULL) {
        $this->db->select('*');
        $this->db->from(self::TABLE_NAME);
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field=>$value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where(self::PRI_INDEX, $where);
            }
        }
        $result = $this->db->get()->result_array();
        if ($result) {
            if ($where !== NULL) {
                return array_shift($result);
            } else {
                return $result;
            }
        } else {
            return false;
        }
    }

/**
 * Count how many likes has the element
 * @param  [type] $id [element_id]
 * @return [int] [likes]
 */
    public function count_likes($id = NULL) {
        $sql = 'SELECT *, count(*) as count FROM users_elements WHERE elements_id = ?';
        
        $result = $this->db->query($sql,array($id))->result_array();
        
        if ($result) {
            return $result[0]['count'];            
        } else {
            return 0;
        }
    }

    public function did_like($elements_id = NULL,$users_id = NULL) {
        $sql = 'SELECT * FROM users_elements WHERE elements_id = ? AND users_id = ?';
        
        $query = $this->db->query($sql,array($elements_id,$users_id));
        
        return $query->num_rows();
    }    
}

     


 ?>
