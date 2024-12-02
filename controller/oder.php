<?php
class oderController
{
    public $productModel;
    public $userModel;
    public $oderModel;
    public function __construct()

    {
        $this->oderModel = new oderModel();
    }
    public function listOrder()
    {
        if (isset($_POST['status'])) {
            if (isset($_POST['payment_status']) || isset($_POST['shipping_status'])) {
                foreach ($_POST['payment_status'] as $id => $payment_status) {
                    $shipping_status = $_POST['shipping_status'][$id] ?? null; // Lấy shipping_status nếu có
                    $this->oderModel->updateOrder($id, $payment_status, $shipping_status);
                }
            }
        }

        // Lấy danh sách orders
        $listOrder = $this->oderModel->getAllOrder();

        // var_dump($listOrder);
        include './views/oder/oder.php';
    }
    public function chitietOrder($id)
    {
        $order = $this->oderModel->getOrderById($id);
        // var_dump($order);
        include './views/oder/chitietOrder.php';
    }
}
