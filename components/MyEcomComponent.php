<?php

namespace app\components;

use app\models\ar\Discount;
use opus\ecom\Basket;
use opus\ecom\Component;
use opus\ecom\models\OrderInterface;
use opus\payment\services\payment\Transaction;


class MyEcomComponent extends Component
{
   
    public function finalizeTransaction(OrderInterface $order, Transaction $transaction)
    {
        $transaction->setComment('Example comment');
        $transaction->setReference('123');
    }

    public function finalizeBasketPrice($price, Basket $basket)
    {
        foreach ($basket->getItems(Basket::ITEM_DISCOUNT) as $model) {
            
            if ($model instanceof Discount) {
                if ($model->type === 'PERCENT') {
                    $price *= (100 - $model->amount) / 100;
                }
            }
        }
        return ceil($price);
    }
}