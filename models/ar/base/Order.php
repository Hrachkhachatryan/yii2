<?php

namespace app\models\ar\base;

/**
 * #property \app\models\ar\Invoice[] $invoices
 * #property \app\models\ar\User $user
 * #property \app\models\ar\OrderLine[] $orderLines
 * #property \app\models\ar\Payment[] $payments
 * #method static \yii\db\ActiveQuery|\app\models\ar\Order|null find($q=null)
 */
abstract class Order extends \yii\db\ActiveRecord
{
    
    public static function tableName()
    {
        return 'eco_order';
    }

    public function rules()
    {
        return [
			[['user_id', 'status', 'due_amount', 'created'], 'required'],
			[['user_id', 'due_amount'], 'integer'],
			[['created'], 'safe'],
			[['status'], 'string', 'max' => 20]
		];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'status' => 'Status',
            'due_amount' => 'Due Amount',
            'created' => 'Created',
        ];
    }

    /**
     * #return \yii\db\ActiveRelation
     */
    public function getInvoices()
    {
        return $this->hasMany(\app\models\ar\Invoice::className(), ['order_id' => 'id']);
    }

    /**
     * #return \yii\db\ActiveRelation
     */
    public function getUser()
    {
        return $this->hasOne(\app\models\ar\User::className(), ['id' => 'user_id']);
    }

    /**
     * #return \yii\db\ActiveRelation
     */
    public function getOrderLines()
    {
        return $this->hasMany(\app\models\ar\OrderLine::className(), ['order_id' => 'id']);
    }

    /**
     * #return \yii\db\ActiveRelation
     */
    public function getPayments()
    {
        return $this->hasMany(\app\models\ar\Payment::className(), ['order_id' => 'id']);
    }
}
