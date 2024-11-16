<?php
class AccountController
{
    public $modelTaiKhoan;
    public function __construct()

    {
        $this->modelTaiKhoan = new AccountModel();
    }
    public function listTKNV()
    {
        if (isset($_POST['save_status'])) {
            if (isset($_POST['role'])) {
                var_dump($_POST['role']);
                foreach ($_POST['role'] as $id => $role) {
                    $this->modelTaiKhoan->updateRole($id, $role);
                }
            }
            if (isset($_POST['status'])) {
                foreach ($_POST['status'] as $id => $status) {
                    $this->modelTaiKhoan->updateStatus($id, $status);
                }
            }
        }
        $listTK = $this->modelTaiKhoan->getAllTaiKhoan(2);
        include './views/taiKhoan/listTKNV.php';
    }
    public function listTKC()
    {
        if (isset($_POST['save_status'])) {
            if (isset($_POST['role'])) {
                foreach ($_POST['role'] as $id => $role) {
                    $this->modelTaiKhoan->updateRole($id, $role);
                }
            }
            if (isset($_POST['status'])) {
                foreach ($_POST['status'] as $id => $status) {
                    $this->modelTaiKhoan->updateStatus($id, $status);
                }
            }
        }
        $listTK = $this->modelTaiKhoan->getAllTaiKhoan(3);
        include './views/taiKhoan/listTKC.php';
    }
}