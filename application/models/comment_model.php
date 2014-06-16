<?php 

class Comment_model extends CI_Model {

    /**
     * @name string TABLE_NAME Holds the name of the table in use by this model
     */
    const TABLE_NAME = 'comments';
    const PRI_INDEX = 'id';
    
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

     public function delete($where = array()) {
        if (!is_array($where)) {
            $where = array(self::PRI_INDEX => $where);
        }
        $this->db->delete(self::TABLE_NAME, $where);
        return $this->db->affected_rows();
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
     * [get_comments description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function get_comments($id = NULL) {
        $sql = 'SELECT * FROM comments INNER JOIN users ON comments.user_id = users.id WHERE comments.element_id = ?';
        
        $result = $this->db->query($sql,array($id))->result_array();
        if ($result) {
            return $result;            
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
}

     


 ?>
