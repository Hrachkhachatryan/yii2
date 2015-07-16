<?php
/** 
 * @var \yii\web\View $this
 * @var \opus\ecom\models\OrderInterface $order
 */
?>


<h1>Select your method of payment</h1>
<h3>Total due: <?=$order->getTransactionSum()?> </h3>

<?php
// renders \opus\ecom\widgets\PaymentButtons
\Yii::$app->ecom->payment->createWidget($order, [])->run();
?>
