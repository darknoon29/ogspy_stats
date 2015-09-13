<?php
/**
 * Created by IntelliJ IDEA.
 * User: anthony
 * Date: 30/06/15
 * Time: 17:15
 */

class Ogspy_mods_stats_model extends CI_Model {

    public $str;

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function update_mod_data($ogspy_key, $mod_list)
    {
        log_message('debug','Enter in function update_mod_data');
        $ogspy_id = $this->ogspystats_model->get_ogspy_id($ogspy_key);
        log_message('debug','OGSpy_id='.$ogspy_id);
        //D�but transaction
        $this->clean_ogspy_mods($ogspy_id);

        foreach($mod_list as $mod){
            $this->insert_mod($ogspy_id, $mod);
        }
        //Fin transaction
    }

    private function clean_ogspy_mods($ogspy_id){

        $this->db->delete('ogspy_has_modules', array('ogspy_id' => $ogspy_id));

    }

    private function insert_mod($ogspy_id,$mod){
        //V�rification que le Mod existe dans la base
        $mod_id = $this->get_mod_id($mod);

       if( -1 == $mod_id){
           log_message('error','Mod '.$mod. ' does not exists');
       }else{

           $data = array(
               'ogspy_id' => $ogspy_id,
               'module_id' => $mod_id
            );

           $str = $this->db->insert('ogspy_has_modules', $data);
       }
    }

    private function get_mod_id($mod_name)
    {
        $query = $this->db->select('id')->from('modules')->where('name', $mod_name)->get();
        if ($query->num_rows() > 0) {

            $row = $query->row();
            return $row->id;
        }
        else
            return -1;
    }
}