<?php

namespace app\models\ar\base;

/**
 * #property integer $id
 * #property string $name
 *
 * #property \app\models\ar\Order[] $orders
 * #property \app\models\ar\Payment[] $payments
 * #method static \yii\db\ActiveQuery|\app\models\ar\User|null find($q=null)
 */
abstract class User extends \yii\db\ActiveRecord
{
    /**
     * #inheritdoc
     */
    public static function tableName()
    {
        return 'eco_user';
    }

    /**
     * #inheritdoc
     */
    public function rules()
    {
        return [
			[['name'], 'string', 'max' => 255]
		];
    }

    /**
     * #inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * #return \yii\db\ActiveRelation
     */
    public function getOrders()
    {
        return $this->hasMany(\app\models\ar\Order::className(), ['user_id' => 'id']);
    }

    /**
     * #return \yii\db\ActiveRelation
     */
    public function getPayments()
    {
        return $this->hasMany(\app\models\ar\Payment::className(), ['user_id' => 'id']);
    }
}
