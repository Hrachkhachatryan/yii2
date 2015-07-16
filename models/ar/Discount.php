<?php

namespace app\models\ar;

use opus\ecom\models\BasketDiscountInterface;
use opus\ecom\Basket;

class Discount extends base\Discount implements BasketDiscountInterface
{
    /**
     * @inheritdoc
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @inheritdoc
     */
    public function applyToBasket(Basket $basket, &$basketTotalSum)
    {
        if ($this->type === 'COUPON') {
            $basketTotalSum -= $this->amount;
        }
    }

    /**
     * @inheritdoc
     */
    public function serialize()
    {
        return serialize($this->attributes);
    }

    /**
     * @inheritdoc
     */
    public function unserialize($serialized)
    {
        $this->setAttributes(unserialize($serialized), false);
    }

    /**
     * Checks if the item is valid
     * Errors are viewable through $this->getErrors();
     *
     * @return bool
     */
    public function validateItem()
    {
        return true;
    }

    /**
     * Returns all errors for current model (after validating)
     *
     * @return string[]
     */
    public function getItemErrors()
    {
        return [];
    }

    /**
     * Returns the primary key for the ActiveRecord item
     *
     * @return string
     */
    public function getPKValue()
    {
        return $this->id;
    }
}
