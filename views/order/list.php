<?php
/**
 * @var \yii\web\View $this
 * @var \yii\data\ActiveDataProvider $dataProvider
 */
?>

<h1>Orders</h1>
    <div class="row">
    <div class="col-lg-8 ">
        <?php
        echo \opus\ecom\widgets\GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'id:text:#',
                'user_id:text:User',
                'status',
                'due_amount:price',
                'created:datetime',
                [
                    'class' => \yii\grid\ActionColumn::className(),
                    'template' => '{view}',
                    'buttons' => [
                        'view' => function($url, $model) {
                            return \yii\helpers\Html::a('Details', ['order/view', 'orderId' => $model->id]);
                        }
                    ]
                ]
            ]
        ]);
?>
    </div>
</div>