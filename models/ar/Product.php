<?php

namespace app\models\ar;

use opus\ecom\models\BasketProductInterface;


class Product extends base\Product implements BasketProductInterface
{
    /**
     * #var int No fancy getter/setter needed, just use a property for that
     */
    public $basketQuantity = 1;

    /**
     * #inheritdoc
     */
    public function getLabel()
    {
        return $this->name;
    }

    /**
     * Only used to display a number if product list. Not required by ecom component
     * #return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Returns the absolute VAT. Used in shopping basket view and accessed via 'vatSum' column
     * #return float
     */
    public function getVatSum()
    {
        return $this->vat * $this->getPrice();
    }

    /**
     * #inheritdoc
     */
    public function getTotalPrice()
    {
        return $this->getPrice() * $this->basketQuantity;
    }

    /**
     * Returns the VAT for a quantity of products. Used in checkout view
     * #return float
     */
    public function getTotalVat()
    {
        return $this->getVatSum() * $this->basketQuantity;
    }

    /**
     * #inheritdoc
     */
    public function serialize()
    {
        return serialize($this->attributes);
    }

    /**
     * #inheritdoc
     */
    public function unserialize($serialized)
    {
        $this->setAttributes(unserialize($serialized), false);
    }

    /**
     * Checks if the item is valid
     * Errors are viewable through $this->getErrors();
     *
     * #return bool
     */
    public function validateItem()
    {
        return true;
    }

    /**
     * Returns all errors for current model (after validating)
     *
     * #return string[]
     */
    public function getItemErrors()
    {
        return [];
    }

    /**
     * Returns the primary key for the ActiveRecord item
     *
     * #return string
     */
    public function getPKValue()
    {
        return $this->id;
    }
}
