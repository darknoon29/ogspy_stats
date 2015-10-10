<?php
/**
 * Created by IntelliJ IDEA.
 * User: anthony
 * Date: 30/06/15
 * Time: 17:15
 */

class Ogspystats_model extends CI_Model {

    public $str;

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function get_last_ten_entries()
    {
        $query = $this->db->get('ogspy', 10);
        return $query->result();
    }

    public function get_ogspy_id($ogspy_key)
    {
        $query = $this->db->select('id')->from('ogspy')->where('ogspy_key', $ogspy_key)->get();
        $row = $query->row();
        return $row->id;
    }

    public function get_php_versions(){
        $query = $this->db->select('php_version')->get('ogspy');

        foreach ($query->result() as $row) {

            $php_vresult[] = $row->php_version;
        }
        $phpversions = array_count_values($php_vresult);
        return($phpversions);
    }

    public function get_ogspy_versions(){
        $query = $this->db->select('version')->get('ogspy');

        foreach ($query->result() as $row) {

            $ogspy_vresult[] = $row->version;
        }
        $ogspyversions = array_count_values($ogspy_vresult);
        return($ogspyversions);
    }

    public function get_uni_number(){
        $query = $this->db->select('uni')->get('ogspy');

        foreach ($query->result() as $row) {

            $uni_vresult[] = $row->uni;
        }
        $uni_number = array_count_values($uni_vresult);
        return($uni_number);
    }

    public function get_uni_pays(){
        $query = $this->db->select('pays')->get('ogspy');

        foreach ($query->result() as $row) {

            $pays_vresult[] = $row->pays;
        }
        $ogspy_pays = array_count_values($pays_vresult);
        return($ogspy_pays);
    }


    public function get_total_servers(){

        $total_servers = $this->db->count_all('ogspy');
        return($total_servers);
    }

    public function get_total_users(){

        $total_users = 0;
        $query = $this->db->get('ogspy');

        foreach ($query->result() as $row)
        {
            $total_users += $row->nb_users;
        }
        return($total_users);
    }

    /**
     * @param $ogspy_key
     * @param $version
     * @param $ogspy_since
     * @param $nb_users
     * @param $db_size
     * @param $php_version
     * @param $og_uni
     * @param $og_pays
     */
    public function update_ogspy_data($ogspy_key, $version,$ogspy_since,$nb_users,$db_size,$php_version,$og_uni,$og_pays){

        if($this->is_server_present($ogspy_key) > 0){

            $this->update_entry($ogspy_key,$version,$ogspy_since,$nb_users,$db_size,$php_version,$og_uni,$og_pays);

        }else{
            $this->insert_entry($ogspy_key,$version,$ogspy_since,$nb_users,$db_size,$php_version,$og_uni,$og_pays);
        }

    }

    private function insert_entry($ogspy_key, $version,$ogspy_since,$nb_users,$db_size,$php_version,$og_uni,$og_pays)
    {
        log_message('debug','Enter in function insert_entry');
        $data = array('ogspy_key' => $ogspy_key,
            'version' => $version,
            'install_date' => $ogspy_since,
            'last_seen' => now(),
            'nb_users' => $nb_users,
            'db_size' => $db_size,
            'php_version' => $php_version,
            'uni' => $og_uni,
            'pays' => $og_pays,
        );

        $str = $this->db->insert('ogspy', $data);
    }

    private function update_entry($ogspy_key, $version,$ogspy_since,$nb_users,$db_size,$php_version,$og_uni,$og_pays)
    {
        log_message('debug','Enter in function update_entry');
        $data = array('ogspy_key' => $ogspy_key,
            'version' => $version,
            'install_date' => $ogspy_since,
            'last_seen' => now(),
            'nb_users' => $nb_users,
            'db_size' => $db_size,
            'php_version' => $php_version,
            'uni' => $og_uni,
            'pays' => $og_pays,
        );

		$this->db->where('ogspy_key', $ogspy_key);
        $str = $this->db->update('ogspy', $data);

    }

    private function is_server_present($ogspy_key){

        log_message('debug','Enter in function is_server_present: '. $ogspy_key);
        $this->db->where('ogspy_key', $ogspy_key);
        $this->db->from('ogspy');
        $results = $this->db->count_all_results();
        return $results;
      }

}