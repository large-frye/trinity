<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api extends Controller {

    protected $_user = null;

    public function __construct(Kohana_Request $request, Kohana_Response $response) {
        parent::__construct($request, $response);

        $this->workorders_model = Model::factory('Workorders');
        $this->invoice_model = Model::factory('Invoice');
        $this->account_model = Model::factory('Account');
        $this->_user = Auth::instance()->get_user();
        $this->user_type = $this->account_model->get_user_type($this->_user->id);
    }

    public function before() {
        parent::before();
    }

    /**
     * [action_getClients description]
     * @return print out of clients
     */
    public function action_getClients() {
        echo $this->workorders_model->get_clients('json');
    }

    /**
     * [action_items description]
     * @return [type] [description]
     */
    public function action_items() {
        echo json_encode($this->invoice_model->get_invoice_options($this->request->param('id')));
    }

    /**
     * Add an invoice item. 
     * 
     */
    public function action_addItem() {
        $postData = file_get_contents("php://input");
        $request = json_decode($postData);
        $this->invoice_model->add_invoice_items($request, $this->request->param('id'));
    }

    /**
     * [action_orders description]
     * @return [type] [description]
     */
    public function action_orders() {
        echo json_encode($this->account_model->get_work_orders($this->_user->id, $this->user_type, $this->request->param('id'))->as_array());
    }

    /**
     * [action_amountOfOrders description]
     * @return [type] [description]
     */
    public function action_amountOfOrders() {
        $count = $this->workorders_model->get_count_of_workorders($this->_user->id, $this->user_type);
        echo json_encode(array('count' => $count));
    }

    /**
     * [action_getUserType description]
     * @return [type] [description]
     */
    public function action_getUserType() {
        echo json_encode(array('userType' => $this->user_type));
    }

    /**
     * [after description]
     * @return [type] [description]
     */
    public function after() {
        parent::after();
    }

}