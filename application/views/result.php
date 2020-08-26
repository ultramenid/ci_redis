<?php
require_once APPPATH . 'libraries/codeigniter-predis/src/Redis.php';

        // Using the default_server configuration
        $this->redis = new \CI_Predis\Redis();
echo $this->redis->get('nama');
?>
