<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use App\Libraries\ChromePhp;
use App\Models\CommonModel;

class BaseController extends Controller{
    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];
    protected $parser = null;
    protected $request;
    protected $logger;
    protected $menus;
    protected $session;

    protected function getUserInfo(&$params){
        $params['muid'] = $this->session->get('muid');
        $params['buid'] = $this->session->get('buid');
        $params['sub_buid'] = $this->session->get('sub_buid');
        $params['asso_iidx'] = $this->session->get('asso_iidx');
        $params['sess_name'] = $this->session->get('name');
        $params['id'] = $this->session->get('id'); 
    }
}
