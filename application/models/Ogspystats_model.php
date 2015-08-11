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

    public function insert_entry($ogspy_key, $version,$ogspy_since,$nb_users,$db_size,$php_version,$og_uni,$og_pays)
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

    public function update_entry($ogspy_key, $version,$ogspy_since,$nb_users,$db_size,$php_version,$og_uni,$og_pays)
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

    public function is_server_present($ogspy_key){

        log_message('debug','Enter in function is_server_present: '. $ogspy_key);
        $this->db->like('ogspy_key', $ogspy_key);
        $this->db->from('ogspy');
        $results = $this->db->count_all_results();
        return $results;
      }

}