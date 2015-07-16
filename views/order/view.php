<?php
/**
 * @var \yii\web\View $this
 * @var \app\models\ar\Order $order
 */
use yii\data\ActiveDataProvider;
use yii\helpers\Html;

?>


<h1>Order #<?= $order->id ?></h1>

<div class="row col-lg-4 well">
    <h4>Order details</h4>

    <div class="col-md-5">Status:</div>
    <div class="col-md-4 <?=($order->status==='error'?'bg-danger':'bg-info')?>"><?= $order->status ?></div>
    <br/>

    <div class="col-md-5">Due amount:</div>
    <div class="col-md-4"><?= \Yii::$app->ecom->formatter->asPrice($order->due_amount) ?></div>
    <br/>

    <div class="col-md-5">Customer #:</div>
    <div class="col-md-4"><?= $order->user_id ?></div>
    <br/>
    <h4>Order items</h4>
    <?php
    echo \opus\ecom\widgets\GridView::widget([
        'dataProvider' => new ActiveDataProvider([
            'query' => $order->getOrderLines()->with('product'),
            'pagination' => false,
        ]),
        'columns' => [
            ['class' => \yii\grid\SerialColumn::className()],
            'product.name',
            'quantity',
            'due_amount:price'
        ]
    ]);

    if ($order->status === 'new') {
        echo Html::a('Go to payment', ['payment/pay', 'orderId' => $order->id], ['class' => 'btn btn-lg btn-danger']);
    }
    ?>
</div>

<div class="row col-lg-offset-4 ">
    <h4>Invoices</h4>
    <?php
    echo \opus\ecom\widgets\GridView::widget([
        'dataProvider' => new ActiveDataProvider([
            'query' => $order->getInvoices(),
            'pagination' => false,
        ]),
        'columns' => [
            ['class' => \yii\grid\SerialColumn::className()],
            'due_amount:price:Amount',
            'due_datetime:datetime:Deadline',
            'created:datetime:Created'
        ]
    ]);

    echo Html::a('Issue a new invoice', ['order/new-invoice', 'orderId' => $order->id], ['class' => 'btn btn-lg btn-success']);
    ?>
</div>