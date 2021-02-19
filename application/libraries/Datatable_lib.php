<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Datatable_Lib
{

    private $CI;
    /*
     * Fetch members data from the database
     * @param 
     * array=($query,$column_order,$column_search,$order,$count_query=false)
     */

    function __construct($params) {
        // Set table name
        $this->query = $params[0];
        
        // Set orderable column fields
        $this->column_order = $params[1];
        
        // Set searchable column fields
        $this->column_search = $params[2];
        
        // Set default order
        $this->order = $params[3];

        $this->count_query=$params[4];

        $this->CI =& get_instance();
    }
    
    /*
     * Fetch members data from the database
     * @param $_POST filter data based on the posted parameters
     */
    public function getRows($postData){
        $query_string=$this->_get_datatables_query($postData);
        if($postData['length'] != -1){
            $query_string.="limit ".$postData['start'].",".$postData['length'];
        }
        $query = $this->CI->db->query($query_string);
        return $query->result();
    }
    
    /*
     * Count all records
     */
    public function countAll(){
        $this->CI->db->reset_query();
        $result=$this->CI->db->query($this->count_query)->row()->count;
        //return $this->CI->db->count_all_results();
        return ($result)?$result:0;
    }
    
    /*
     * Count records based on the filter params
     * @param $_POST filter data based on the posted parameters
     */
    public function countFiltered($postData){
        $query_string=$this->_get_datatables_query($postData);
        $query = $this->CI->db->query($query_string);
        return $query->num_rows();
    }
    
    /*
     * Perform the SQL queries needed for an server-side processing requested
     * @param $_POST filter data based on the posted parameters
     */
    private function _get_datatables_query($postData){
         $where="where 1";
        $i = 0;
        // loop searchable columns 
        foreach($this->column_search as $item){
            // if datatable send POST for search
            if($postData['search']['value']){
                // first loop
                if($i===0){
                    // open bracket
                    $this->CI->db->group_start();
                    $where.=" and (";
                    $where.=" ".$item." like '%".$postData['search']['value']."%'";
                    // $this->CI->db->like($item, $postData['search']['value']);
                }else{
                    // $this->CI->db->or_like($item, $postData['search']['value']);
                    $where.=" or ".$item." like '%".$postData['search']['value']."%'";
                }
                
                // last loop
                if(count($this->column_search) - 1 == $i){
                    // close bracket
                    $this->CI->db->group_end();
                    $where.=")";
                }
            }
            $i++;
        }
         
        if(isset($postData['order'])){
            // $this->CI->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
            $where.=' order by '.$this->column_order[$postData['order']['0']['column']].' '.$postData['order']['0']['dir']." ";
        }else if(isset($this->order)){
            $order = $this->order;
            // $this->CI->db->order_by(key($order), $order[key($order)]);
            $where.=' order by '.key($order).' '.$order[key($order)]." ";
        }
        $this->CI->db->query($this->query.$where);
        return $this->CI->db->last_query();
    }
}