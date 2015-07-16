<?php

namespace app\controllers;


use app\models\ar\Order;
use app\models\ar\Payment;
use opus\ecom\Component;
use yii\data\ActiveDataProvider;
use yii\web\Controller;


class PaymentController extends Controller
{
   
    public $enableCsrfValidation = false;

    
    public function actionPay($orderId)
    {
        $order = Order::findOne($orderId);

        return $this->render('pay', [
            'order' => $order,
        ]);
    }

    public function actionBankReturn()
    {
        
        $ecom = \Yii::$app->ecom;

       
        $model = $ecom->payment->handleResponse($_REQUEST, Order::className());

        $this->redirect(['order/view', 'orderId' => $model->id]);
    }

   
    public function actionList()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Payment::find(),
        ]);
        return $this->render('list', [
            'dataProvider' => $dataProvider,
        ]);
    }

    
    public function actionView($paymentId)
    {
        $payment = Payment::findOne($paymentId);
        return $this->render('view', [
            'payment' => $payment,
        ]);
    }
} 