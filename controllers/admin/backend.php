<?php

require_once(BASE_PATH . 'system/auth.php');
require_once(BASE_PATH . 'system/controller.php');
require_once(BASE_PATH . 'system/view.php');
require_once(BASE_PATH . 'helpers/util.php');

class Backend extends Controller {

    function __construct() {

	    parent::__construct();

        $auth = Auth::getInstance();

        if( $auth->is_logged() || isset($_REQUEST['API']) ) {

            if(session_id() == '') {
                session_start();
            }

        } else {

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $this->view->json(array( 'logged' => false ));

                exit();

            } else {

                redirect(BASE_URL . 'admin/login');
            }
        }

        $this->view = new View();
    }


    function save() {

        $response = $this->model->save();

        $this->view->json($response);
    }


    /*
     * Send json object for add custom form data
     */
    function getNew() {

        $data = $this->model->getNew();

        $data['status'] = 'success';


        $this->view->json( $data );
    }

    function getEdit() {

        $data = $this->model->getEdit();

        if($data) {

            $data['status'] = 'success';

        } else {

            $data['status'] = 'fail';
            $data['message'] = lang('Record not found');
        }

        $this->view->json( $data );
    }

    function getList() {

        $data['total'] = $this->model->getList(TRUE);
        $data['list'] = $this->model->getList(FALSE);

        if($data) {

            $data['status'] = 'success';

        } else {

            $data['status'] = 'fail';
            $data['message'] = lang('Record not found');
        }

        $this->view->json( $data );
    }

    function delete() {

        $this->model->delete();

        $data['status'] = 'success';

        $this->view->json( $data );
    }

    function loadDepends() {

        $this->view->json( $this->model->loadDepends() );
    }

    function loadDependsToolbar() {

        $this->view->json( $this->model->loadDependsToolbar() );
    }

    function upload() {

        $result = $this->model->upload();

        if( is_array($result) or is_object($result) ) {

            $this->view->json(
                $result
            );

        } else {

            echo $result;
        }
    }

    function download( $format = 'xls' ) {

        header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=".lang("report").".xls");  //File name extension was wrong
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private",false);

        $this->model->pagination = array();

        $_REQUEST['filters'] = $_REQUEST;

        $data = $this->model->getList(FALSE);

        $columns = isset($this->model->field_group['report']) ? $this->model->field_group['report'] : $this->model->field_group['grid'];

        if($format == 'xls') {

            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            foreach ($columns as $column) {
                echo "<th>" . @$this->model->fields[$column]['name'] . "</th>";
            }
            echo "</tr>";
            echo "</thead>";

            if ($data) {

                echo "<tbody>";

                foreach ($data as $row) {

                    echo "<tr>";

                    foreach ($columns as $column) {

                        echo "<td>" . @$row[$column] . "</td>";
                    }

                    echo "</tr>";
                }

                echo "</tbody>";

            } else {

                echo "<td colspan='".count($columns)."'>" . lang("No hay filas para mostrar") . "</td>";
            }

            echo "</table>";

        } else if($format == 'csv') {


        }

    }
}
