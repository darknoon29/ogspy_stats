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

    public function get_mod_rank(){

        log_message('debug','Enter in function get_mod_rank');

        $this->db->select('modules.name, COUNT(*)nombre');
        $this->db->from('ogspy_has_modules');
        $this->db->join('modules', 'ogspy_has_modules.module_id = modules.id');
        $this->db->group_by('module_id');
        $this->db->order_by('nombre', 'DESC');
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            $mod_vresult[$row->name] = $row->nombre;
        }
        return $mod_vresult;
    }


    public function update_mod_data($ogspy_key, $mod_list)
    {
        log_message('debug','Enter in function update_mod_data');
        $ogspy_id = $this->ogspystats_model->get_ogspy_id($ogspy_key);
        log_message('debug','OGSpy_id='.$ogspy_id);
        //Début transaction
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
        //Vérification que le Mod existe dans la base
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