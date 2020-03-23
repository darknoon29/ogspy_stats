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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		// Maintenance

		$this->ogspystats_model->maintenance();

        $ogspy_users = $this->ogspystats_model->get_total_users();
        $ogspy_servers = $this->ogspystats_model->get_total_servers();

        $php_versions = $this->ogspystats_model->get_php_versions();
        $php_versions_hc = $this->convert_to_highcharts_pie($php_versions);

        $ogspy_versions = $this->ogspystats_model->get_ogspy_versions();
        $ogspy_versions_hc = $this->convert_to_highcharts_pie($ogspy_versions);

        $ogspy_unis = $this->ogspystats_model->get_uni_number();
        $ogspy_unis_hc = $this->convert_to_highcharts_pie($ogspy_unis);

        $ogspy_pays = $this->ogspystats_model->get_uni_pays();
        $ogspy_pays_hc = $this->convert_to_highcharts_pie($ogspy_pays);

        /* Modules */

        $ogspy_mods_stats = $this->ogspy_mods_stats_model->get_mod_rank();
        $ogspy_mods_stats_hc = $this->convert_to_highcharts_bar($ogspy_mods_stats);

        $data = array(
            'nb_users' => $ogspy_users,
            'nb_servers' => $ogspy_servers,
            'php_versions' => $php_versions_hc,
            'ogspy_versions' => $ogspy_versions_hc,
            'ogspy_uni' => $ogspy_unis_hc,
            'ogspy_pays' => $ogspy_pays_hc,
            'ogspy_mod_rank_name' => $ogspy_mods_stats_hc['name'],
            'ogspy_mod_rank_values' => $ogspy_mods_stats_hc['values']
        );

        $this->load->view('welcome_message', $data);
	}

    private function convert_to_highcharts_pie($data_to_convert){
        $temp = array() ;
        foreach($data_to_convert as $key => $value){

             $temp[$key] = "['" . $key . "'," . $value . " ]";
        }
        // format hightchart
        $hc_table = implode(" , ", $temp);
        return($hc_table);
    }

    private function convert_to_highcharts_bar($data_to_convert){

        foreach($data_to_convert as $key => $value){

            $value_name_array [] = "'" .$key. "'";
            $value_list_array []= $value;
        }
        $value_name ="[".implode(" , ", $value_name_array)."]";
        $value_list ="[".implode(" , ", $value_list_array)."]";

        /*$value_name = "['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']";
        $value_list = "[29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]";*/

        return array('name'=> $value_name ,'values' => $value_list);
    }
}

