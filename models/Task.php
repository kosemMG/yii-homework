<?php

namespace app\models;


use app\validators\DateValidator;
use yii\base\Model;

class Task extends Model
{
    public $title;
    public $description;
    public $executor;
    public $due_date;
    public $comment;

    public function rules()
    {
        return [
            [['title', 'description', 'executor'], 'required'],
            [['title'], 'string', 'max' => 20],
            [['executor'], 'string', 'max' => 15],
            [['due_date'], DateValidator::class],
            [['comment'], 'safe'],
        ];
    }
}