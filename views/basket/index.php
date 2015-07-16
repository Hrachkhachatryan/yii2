<?php
/**
 * @var \yii\web\View $this
 * @var \opus\ecom\Basket $basket
 * @var \app\models\ar\User[] $users
 */
use yii\helpers\Html;
use opus\ecom\Basket;

?>

<h1>Your shopping basket</h1>
<div class="row">
    <div class="col-lg-8 ">

        <?php
        
        echo \opus\ecom\widgets\BasketGridView::widget([
            'basket' => $basket,
            'columns' => [
                ['class' => \yii\grid\SerialColumn::className()],
				
                'label',
                'price:price',
                'vat:percent',
                'basketQuantity',
                'totalPrice:price',
                [
                    'class' => \yii\grid\ActionColumn::className(),
                    'template' => '{delete}'
                ]
            ]
        ]);

        
        echo \opus\ecom\widgets\BasketGridView::widget([
            'basket' => $basket,
            'itemType' => Basket::ITEM_DISCOUNT, 
            'layout' => '{items}',
            'columns' => ['label:text:Discounts']
        ]);
        echo Html::a('Empty basket', ['basket/clear'], ['class' => 'btn btn-danger']);
        ?>
    </div>
</div>
<div class="col-lg-4 row">

    <?php
   
    $totalPrice = $basket->getAttributeTotal('totalPrice', Basket::ITEM_PRODUCT);

   
    $vat = $basket->getAttributeTotal('totalVat', Basket::ITEM_PRODUCT);

  
    $priceWithoutVat = $totalPrice - $vat;

    ?>

    <h4>
        Total: <?= \Yii::$app->ecom->formatter->asPrice($priceWithoutVat) ?>
        + <?= \Yii::$app->ecom->formatter->asPrice($vat) ?> (VAT)
        = <?= \Yii::$app->ecom->formatter->asPrice($totalPrice) ?>
    </h4>

    <h4>Discounts: <?= $basket->getTotalDiscounts() ?> </h4>
    <h3>Total due: <?= $basket->getTotalDue(); ?> </h3>


    <?php
        $form = \yii\widgets\ActiveForm::begin();
        echo $form->field($model, 'userId')->dropDownList($users);
        echo Html::submitButton('Post order', ['class' => 'btn btn-lg btn-success']);
        $form->end();
    ?>
</div>