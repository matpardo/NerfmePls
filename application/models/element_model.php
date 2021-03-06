<?php 

class Element_model extends CI_Model {

    /**
     * @name string TABLE_NAME Holds the name of the table in use by this model
     */
    const TABLE_NAME = 'elements';

    /**
     * @name string PRI_INDEX Holds the name of the tables' primary index used in this model
     */
    const PRI_INDEX = 'id';

    /**
     * Retrieves record(s) from the database
     *
     * @param mixed $where Optional. Retrieves only the records matching given criteria, or all records if not given.
     *                      If associative array is given, it should fit field_name=>value pattern.
     *                      If string, value will be used to match against PRI_INDEX
     * @return mixed Single record if ID is given, or array of results
     */
    public function get($where = NULL) {
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
     * [get_3 description]
     * @param  [type] $where [description]
     * @return [type]        [description]
     */
    public function get_3_best($visit_id = NULL) {
        $query = '(SELECT *,COUNT(*) as count from elements INNER JOIN users_elements on elements.id = users_elements.elements_id WHERE country_id = ? AND section_id = 1 GROUP BY elements_id ORDER BY count desc LIMIT 3)
                    UNION ALL
                  (SELECT *,COUNT(*) as count from elements INNER JOIN users_elements on elements.id = users_elements.elements_id WHERE country_id = ? AND section_id = 2 GROUP BY elements_id ORDER BY count desc LIMIT 3)
                    UNION ALL
                  (SELECT *,COUNT(*) as count from elements INNER JOIN users_elements on elements.id = users_elements.elements_id WHERE country_id = ? AND section_id = 3 GROUP BY elements_id ORDER BY count desc LIMIT 3)';
        
        $result = $this->db->query($query,array($visit_id,$visit_id,$visit_id));
        
        $aux = array();

        foreach ($result->result_array() as $row) {
            $aux[$row['section_id']][] = $row;
        }

        return $aux;
    }

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
     * Updates selected record in the database
     *
     * @param Array $data Associative array field_name=>value to be updated
     * @param Array $where Optional. Associative array field_name=>value, for where condition. If specified, $id is not used
     * @return int Number of affected rows by the update query
     */
    public function update(Array $data, $where = array()) {
            if (!is_array($where)) {
                $where = array(self::PRI_INDEX => $where);
            }
        $this->db->update(self::TABLE_NAME, $data, $where);
        return $this->db->affected_rows();
    }

    /**
     * Deletes specified record from the database
     *
     * @param Array $where Optional. Associative array field_name=>value, for where condition. If specified, $id is not used
     * @return int Number of rows affected by the delete query
     */
    public function delete($where = array()) {
        if (!is_array($where)) {
            $where = array(self::PRI_INDEX => $where);
        }
        $this->db->delete(self::TABLE_NAME, $where);
        return $this->db->affected_rows();
    }

    public function exist($id = null){
        $sql = 'SELECT * FROM elements WHERE elements.id = ?';
        $query = $this->db->query($sql, array($id));   
        return $query->num_rows();
    }

    public function get_elements_by_country($country_id = null, $section_id = null){
        $sql = "SELECT * FROM 
                    (SELECT elements.id,elements.name,price 
                            FROM elements INNER JOIN countries on elements.country_id = countries.id 
                                    WHERE country_id = ? AND section_id = ? ) as elements
                    LEFT JOIN
                    (SELECT elements_id,count(*) as num_likes from users_elements GROUP BY elements_id) as likes 
                     ON likes.elements_id = elements.id 
                     ORDER BY num_likes DESC";
        $query = $this->db->query($sql,array($country_id,$section_id));
        
        return $query->result_array();             
    }

}

     


 ?>
