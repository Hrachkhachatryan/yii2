<?php

namespace app\models\ar\base;

/**
 * This is the base model class for table "eco_discount".
 *
 * @property integer $id
 * @property string $type
 * @property string $label
 * @property integer $amount
 * @method static \yii\db\ActiveQuery|\app\models\ar\Discount|null find($q=null)
 */
abstract class Discount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'eco_discount';
    }

    
    public function rules()
    {
        return [
			[['type', 'label', 'amount'], 'required'],
			[['amount'], 'integer'],
			[['type', 'label'], 'string', 'max' => 255]
		];
    }

   
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'label' => 'Label',
            'amount' => 'Amount',
        ];
    }
}
