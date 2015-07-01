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

        $ogspy_index = $this->input->get('ogspy_index', TRUE);
        $version = $this->input->get('version', TRUE);
        $last_seen = $this->input->get('last_seen', TRUE);
        $db_size = $this->input->get('db_size', TRUE);
        $Xtense_Firefox = $this->input->get('xtense_firefox', TRUE);
        $Xtense_Chrome  = $this->input->get('xtense_chrome', TRUE);
        $Xtense_GM  = $this->input->get('xtense_gm', TRUE);

        echo($ogspy_index);
		//$this->load->view('welcome_message');
	}
}
