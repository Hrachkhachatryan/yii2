<?php

namespace app\models\ar;

/**
 * This is the model class for table "eco_invoice".
 *
 */
class Invoice extends base\Invoice
{
    /**
     * #inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            
        ]);
    }

    /**
     * #inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
          
        ]);
    }
}
