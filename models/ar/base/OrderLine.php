<?php

namespace app\models\ar\base;

/**
 * This is the base model class for table "eco_order_line".
 *
 * #property integer $id
 * #property integer $order_id
 * #property integer $product_id
 * #property string $quantity
 * #property integer $due_amount
 *
 * #property \app\models\ar\Product $product
 * #property \app\models\ar\Order $order
 * #method static \yii\db\ActiveQuery|\app\models\ar\OrderLine|null find($q=null)
 */
abstract class OrderLine extends \yii\db\ActiveRecord
{
    /**
     * #inheritdoc
     */
    public static function tableName()
    {
        return 'eco_order_line';
    }

    /**
     * #inheritdoc
     */
    public function rules()
    {
        return [
			[['order_id', 'product_id', 'quantity', 'due_amount'], 'required'],
			[['order_id', 'product_id', 'due_amount'], 'integer'],
			[['quantity'], 'number']
		];
    }

    /**
     * #inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'quantity' => 'Quantity',
            'due_amount' => 'Due Amount',
        ];
    }

    /**
     * #return \yii\db\ActiveRelation
     */
    public function getProduct()
    {
        return $this->hasOne(\app\models\ar\Product::className(), ['id' => 'product_id']);
    }

    /**
     * #return \yii\db\ActiveRelation
     */
    public function getOrder()
    {
        return $this->hasOne(\app\models\ar\Order::className(), ['id' => 'order_id']);
    }
}
