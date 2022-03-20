<?php
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductsCtrl extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Products_Model');
    }

    function add(){
        $data;
        //Inicializar variables
        ($_POST['prodDescripcion'] != '') ? $data['producto'] = $_POST['prodDescripcion'] : null;
        ($_POST['prodMarca'] != '') ? $data['marca'] = $_POST['prodMarca'] : null;
        (isset($_POST['prodPrecioCompra'])) ? $data['precio_compra'] = $_POST['prodPrecioCompra'] : null;
        (isset($_POST['prodPrecioVenta'])) ? $data['precio_venta'] = $_POST['prodPrecioVenta'] : null;
        (isset($_POST['prodExistencias'])) ? $data['existencias'] = $_POST['prodExistencias'] : null;
        (isset($_POST['prodExistenciasMin'])) ? $data['stock_minimo'] = $_POST['prodExistenciasMin'] : null;
        

        if($this->Products_Model->add($data)){
        	// ...
        }
        redirect(site_url('productos/agregar'), 'refresh');
    }

}