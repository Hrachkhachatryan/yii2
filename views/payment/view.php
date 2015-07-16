<?php
/**
 * @var \yii\web\View $this
 * @var \app\models\ar\Payment $payment
 */
?>

<h1>Payment #<?=$payment->id?></h1>
<div class="row col-lg-9 well">
    <h4>Order details</h4>

    <div class="col-md-5">Datetime:</div>
    <div class="col-md-4"><?= \Yii::$app->ecom->formatter->asDatetime($payment->created) ?></div>
    <br/>

    <div class="col-md-5">Status:</div>
    <div class="col-md-4 <?=($payment->status==='error'?'bg-danger':'bg-info')?>"><?= $payment->status ?></div>
    <br/>

    <div class="col-md-5">Due amount:</div>
    <div class="col-md-4"><?= $payment->amount ?></div>
    <br/>

    <div class="col-md-5">Customer #:</div>
    <div class="col-md-4"><?= $payment->user_id ?></div>
    <br/>

    <div class="col-md-5">Bank:</div>
    <div class="col-md-4"><?= $payment->bank_code?></div>
    <br/>

    <h4>Data dump</h4>
    <pre>
        <?= $payment->data_dump ?>
    </pre>
</div>