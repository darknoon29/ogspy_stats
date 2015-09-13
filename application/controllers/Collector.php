<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collector extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $ogspy_key = $this->input->get('server_key', TRUE);
        $ogspy_since = $this->input->get('server_since', TRUE);
        $version = $this->input->get('version', TRUE);
        $nb_users = $this->input->get('nb_users', TRUE);
        $db_size = $this->input->get('db_size', TRUE);
        $php_version = $this->input->get('php_version', TRUE);
        $og_uni = $this->input->get('og_uni', TRUE);
        $og_pays = $this->input->get('og_pays', TRUE);
        $mod_list = json_decode($this->input->get('mod_list', TRUE));

        $this->ogspystats_model->update_ogspy_data($ogspy_key,$version,$ogspy_since,$nb_users,$db_size,$php_version,$og_uni,$og_pays);
        if(isset($mod_list)){
            $this->ogspy_mods_stats_model->update_mod_data($ogspy_key, $mod_list);
        }
	}
}