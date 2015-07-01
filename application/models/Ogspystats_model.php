<?php
/**
 * Created by IntelliJ IDEA.
 * User: anthony
 * Date: 30/06/15
 * Time: 17:15
 */

class Ogspystats_model extends CI_Model {

    public $title;
    public $content;
    public $date;

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

    public function insert_entry()
    {
        $this->title    = $_POST['title']; // please read the below note
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->insert('entries', $this);
    }

    public function update_entry()
    {
        $this->title    = $_POST['title'];
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

}