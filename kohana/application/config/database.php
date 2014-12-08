<?php defined('SYSPATH') or die('No direct access allowed.');

class Database_Config {

    /**
     * [$host description]
     * @var [type]
     */
    private $host;

    /**
     * [$user description]
     * @var [type]
     */
    private $user;

    /**
     * [$password description]
     * @var [type]
     */
    private $password;

    /**
     * [__construct description]
     */
    public function __construct() {
        $this->host = 'localhost';
        $this->user = 'root';
        $this->password = 'Sprite20**';
    }



    /**
     * [set_defaults description]
     * @param [type] $host     [description]
     * @param [type] $user     [description]
     * @param [type] $password [description]
     */
    public function set_defaults($host, $user, $password) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * [get_host description]
     * @return [type] [description]
     */
    public function get_host() {
        return $this->host;
    }

    /**
     * [get_user description]
     * @return [type] [description]
     */
    public function get_user() {
        return $this->user;
    }

    /**
     * [get_password description]
     * @return [type] [description]
     */
    public function get_password() {
        return $this->password;
    }

}

$config = new Database_Config();

if ( preg_match('/trinity\.local/', $_SERVER['HTTP_HOST']) !== -1 ) {
    $config->set_defaults('198.74.52.114', 'trinity_develop', '3tJWkAxT4WEhQNRhWzaK');
}

return array(
    'default' => array('type'       => 'MySQL',
                       'connection' => array('hostname' => $config->get_host(),
                                             'database' => 'trinity',
                                             'username'   => $config->get_user(),
                                             'password'   => $config->get_password(),
                                             'persistent' => FALSE),
                       'table_prefix' => '',
                       'charset'      => 'utf8',
                       'caching'      => FALSE,
                       'profiling'    => TRUE),
);


// end of script