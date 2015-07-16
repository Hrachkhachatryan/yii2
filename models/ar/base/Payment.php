<?php

namespace app\models\ar\base;

/**
 * 
 *
 * #property integer $id
 * #property integer $user_id
 * #property integer $order_id
 * #property string $bank_code
 * #property string $amount
 * #property string $status
 * #property string $data_dump
 * #property string $created
 *
 * #property \app\models\ar\User $user
 * #property \app\models\ar\Order $order
 * #method static \yii\db\ActiveQuery|\app\models\ar\Payment|null find($q=null)
 */
abstract class Payment extends \yii\db\ActiveRecord
{
    /**
     * #inheritdoc
     */
    public static function tableName()
    {
        return 'eco_payment';
    }

    /**
     * #inheritdoc
     */
    public function rules()
    {
        return [
			[['user_id', 'order_id'], 'integer'],
			[['order_id', 'bank_code', 'amount', 'status', 'data_dump', 'created'], 'required'],
			[['data_dump'], 'string'],
			[['created'], 'safe'],
			[['bank_code', 'status'], 'string', 'max' => 20],
			[['amount'], 'string', 'max' => 255]
		];
    }

    /**
     * #inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'order_id' => 'Order ID',
            'bank_code' => 'Bank Code',
            'amount' => 'Amount',
            'status' => 'Status',
            'data_dump' => 'Data Dump',
            'created' => 'Created',
        ];
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
    public function getOrder()
    {
        return $this->hasOne(\app\models\ar\Order::className(), ['id' => 'order_id']);
    }
}
