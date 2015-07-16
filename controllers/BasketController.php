<?php

namespace app\controllers;

use app\models\ar\Discount;
use app\models\ar\Order;
use app\models\ar\Product;
use app\models\ar\User;
use app\models\BasketModel;
use opus\ecom\Basket;
use Yii;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\web\Controller;


class BasketController extends Controller
{
   
    protected $basket;

    public function init()
    {
        parent::init();
        $this->basket = \Yii::$app->ecom->basket;
    }

    
    public function actionIndex()
    {
        $model = new BasketModel;

        if ($_POST && $model->load($_POST)) {
           
            $order = new Order([
                'user_id' => $model->userId,
                'status' => 'new',
                'created' => new Expression('NOW()'),
            ]);

            $this->basket->createOrder($order);
            $this->redirect(['payment/pay', 'orderId' => $order->id]);
        }

        $params = [
            'basket' => $this->basket,
            'users' => ArrayHelper::map(User::find()->all(), 'id', 'name'),
            'model' => $model,
        ];
        return $this->render('index', $params);
    }

    public function actionDelete($id)
    {
        $this->basket->remove($id);
        return $this->redirect(['basket/index']);
    }

    public function actionAddProduct($id)
    {
        $product = Product::findOne($id);
        $this->basket->add($product);
        return $this->redirect(['site/index']);
    }

    public function actionAddDiscount($id)
    {
        $discount = Discount::findOne($id);
        $this->basket->add($discount);
        return $this->redirect(['basket/index']);
    }

    public function actionClear()
    {
        $this->basket->clear(true);
        return $this->redirect(['basket/index']);
    }
} 