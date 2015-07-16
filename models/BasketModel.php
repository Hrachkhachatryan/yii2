<?php

namespace app\models;


use yii\base\Model;

class BasketModel extends Model
{
    public $userId;

    public function rules()
    {
        return [[['userId'], 'safe']];
    }
}