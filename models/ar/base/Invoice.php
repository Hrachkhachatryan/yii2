<?php

namespace app\models\ar\base;

/**
 * @property \app\models\ar\Order $order
 * @method static \yii\db\ActiveQuery|\app\models\ar\Invoice|null find($q=null)
 */
abstract class Invoice extends \yii\db\ActiveRecord
{
    
    public static function tableName()
    {
        return 'eco_invoice';
    }

    public function rules()
    {
        return [
			[['order_id', 'due_amount', 'created'], 'required'],
			[['order_id', 'due_amount'], 'integer'],
			[['due_datetime', 'created'], 'safe']
		];
    }

   
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'due_amount' => 'Due Amount',
            'due_datetime' => 'Due Datetime',
            'created' => 'Created',
        ];
    }

    /**
     * @return \yii\db\ActiveRelation
     */
    public function getOrder()
    {
        return $this->hasOne(\app\models\ar\Order::className(), ['id' => 'order_id']);
    }

}
