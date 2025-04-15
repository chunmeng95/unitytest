<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('migration');
    }

    /**
     * Index function will run all pending migrations.
     * It outputs a message regarding the status.
     */
    public function index() {
        if ($this->migration->current() === FALSE) {
            show_error($this->migration->error_string());
        } else {
            echo "Migration successful!";
        }
    }
}
