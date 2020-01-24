<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "extra_service_selling".
 *
 * @property int $id
 * @property int $extra_service_id
 * @property string $sum
 * @property int $quantity
 * @property int $current_price
 * @property int $client_id
 *
 * @property Client $client
 * @property ExtraService $extraService
 */
class ExtraServiceSelling extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'extra_service_selling';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['extra_service_id', 'sum', 'quantity', 'current_price', 'client_id'], 'required'],
            [['extra_service_id', 'quantity', 'current_price', 'client_id'], 'integer'],
            [['sum'], 'string', 'max' => 45],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['client_id' => 'id']],
            [['extra_service_id'], 'exist', 'skipOnError' => true, 'targetClass' => ExtraService::className(), 'targetAttribute' => ['extra_service_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'extra_service_id' => 'Extra Service ID',
            'sum' => 'Sum',
            'quantity' => 'Quantity',
            'current_price' => 'Current Price',
            'client_id' => 'Client ID',
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'client_id']);
    }

    /**
     * Gets query for [[ExtraService]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExtraService()
    {
        return $this->hasOne(ExtraService::className(), ['id' => 'extra_service_id']);
    }
}
