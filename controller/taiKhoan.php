<?php
class AccountController
{
    public $modelTaiKhoan;
    public $orderModel;
    public function __construct()

    {
        $this->modelTaiKhoan = new AccountModel();
        $this->orderModel = new oderModel();
    }
    public function listTKNV()
    {
        if (isset($_POST['save_status'])) {
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
            if (isset($_POST['status'])) {
                foreach ($_POST['status'] as $id => $status) {
                    // Kiểm tra trạng thái tài khoản và xem có đơn hàng nào đang hoạt động
                    $activeOrders = $this->orderModel->getActiveOrdersByUser($id);

                    if ($status == 0 && count($activeOrders) > 0) {
                        // Nếu tài khoản có đơn hàng đang hoạt động, không cho phép chuyển sang "Inactive"
                        echo "<script>alert('Không thể chuyển trạng thái tài khoản thành Inactive vì có đơn hàng đang hoạt động. Vui lòng xử lý đơn hàng trước!');</script>";
                    } else {
                        // Cập nhật trạng thái tài khoản
                        $this->modelTaiKhoan->updateStatus($id, $status);
                    }
                }
            }
        }
        $role = 3;
        $listTK = $this->modelTaiKhoan->getAllTaiKhoan($role);
        include './views/taiKhoan/listTKC.php';
    }
}
