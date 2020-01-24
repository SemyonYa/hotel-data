<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "extra_service".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property int|null $price
 * @property string|null $measure
 *
 * @property ExtraServiceSelling[] $extraServiceSellings
 */
class ExtraService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'extra_service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['price'], 'integer'],
            [['name', 'measure'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'price' => 'Price',
            'measure' => 'Measure',
        ];
    }

    /**
     * Gets query for [[ExtraServiceSellings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExtraServiceSellings()
    {
        return $this->hasMany(ExtraServiceSelling::className(), ['extra_service_id' => 'id']);
    }
}
