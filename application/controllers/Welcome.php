<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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


        $ogspy_users = $this->ogspystats_model->get_total_users();
        $ogspy_servers = $this->ogspystats_model->get_total_servers();

        $php_versions = $this->ogspystats_model->get_php_versions();
        $php_versions_hc = $this->convert_to_highcharts($php_versions);

        $ogspy_versions = $this->ogspystats_model->get_ogspy_versions();
        $ogspy_versions_hc = $this->convert_to_highcharts($ogspy_versions);

        $ogspy_unis = $this->ogspystats_model->get_uni_number();
        $ogspy_unis_hc = $this->convert_to_highcharts($ogspy_unis);

        $ogspy_pays = $this->ogspystats_model->get_uni_pays();
        $ogspy_pays_hc = $this->convert_to_highcharts($ogspy_pays);

        $data = array(
            'nb_users' => $ogspy_users,
            'nb_servers' => $ogspy_servers,
            'php_versions' => $php_versions_hc,
            'ogspy_versions' => $ogspy_versions_hc,
            'ogspy_uni' => $ogspy_unis_hc,
            'ogspy_pays' => $ogspy_pays_hc
        );

        $this->load->view('welcome_message', $data);
	}

    private function convert_to_highcharts($data_to_convert){
        $temp = "";
        foreach($data_to_convert as $key => $value){

             $temp[]= "['" . $key . "'," . $value . " ]";
        }
        // format hightchart
        $hc_table = implode(" , ", $temp);
        return($hc_table);
    }
}
