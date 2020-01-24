<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property int $id
 * @property int $client_id
 * @property int $room_id
 * @property string $date_start
 * @property string $date_end
 * @property int $diet_id
 * @property int $current_price
 * @property int|null $sum
 *
 * @property Diet $diet
 * @property Room $room
 * @property BookingClient[] $bookingClients
 * @property Client[] $clients
 * @property Payment[] $payments
 */
class Booking extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'booking';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'room_id', 'date_start', 'date_end', 'diet_id', 'current_price'], 'required'],
            [['client_id', 'room_id', 'diet_id', 'current_price', 'sum'], 'integer'],
            [['date_start', 'date_end'], 'safe'],
            [['diet_id'], 'exist', 'skipOnError' => true, 'targetClass' => Diet::className(), 'targetAttribute' => ['diet_id' => 'id']],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_id' => 'Client ID',
            'room_id' => 'Room ID',
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
            'diet_id' => 'Diet ID',
            'current_price' => 'Current Price',
            'sum' => 'Sum',
        ];
    }

    /**
     * Gets query for [[Diet]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiet()
    {
        return $this->hasOne(Diet::className(), ['id' => 'diet_id']);
    }

    /**
     * Gets query for [[Room]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['id' => 'room_id']);
    }

    /**
     * Gets query for [[BookingClients]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookingClients()
    {
        return $this->hasMany(BookingClient::className(), ['booking_id' => 'id']);
    }

    /**
     * Gets query for [[Clients]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClients()
    {
        return $this->hasMany(Client::className(), ['id' => 'client_id'])->viaTable('booking_client', ['booking_id' => 'id']);
    }

    /**
     * Gets query for [[Payments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['booking_id' => 'id']);
    }
}
