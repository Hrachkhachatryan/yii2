<?php

namespace app\controllers;


use app\models\ar\Invoice;
use app\models\ar\Order;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\web\Controller;


class OrderController extends Controller
{
    
    public function actionView($orderId)
    {
        $order = Order::findOne($orderId);

        return $this->render('view', [
            'order' => $order
        ]);
    }

   
    public function actionList()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Order::find(),
        ]);
        return $this->render('list', [
            'dataProvider' => $dataProvider,
        ]);
    }

    
    public function actionNewInvoice($orderId)
    {
        $order = Order::findOne($orderId);

        $invoice = new Invoice([
            'order_id' => $order->id,
            'due_amount' => $order->due_amount,
            'due_datetime' => (new \DateTime('+10 days'))->format('Y-m-d H:i:s'),
            'created' => new Expression('NOW()')
        ]);
        $invoice->save();
        $this->redirect(['order/view', 'orderId' => $orderId]);
    }
} 