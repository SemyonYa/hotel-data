<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $Fio
 * @property string $doc_type
 * @property string $doc_no
 * @property string $birthday
 * @property string|null $description
 *
 * @property BookingClient[] $bookingClients
 * @property Booking[] $bookings
 * @property ExtraServiceSelling[] $extraServiceSellings
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Fio', 'doc_no', 'birthday'], 'required'],
            [['doc_no', 'description'], 'string'],
            [['birthday'], 'safe'],
            [['Fio'], 'string', 'max' => 100],
            [['doc_type'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Fio' => 'Fio',
            'doc_type' => 'Doc Type',
            'doc_no' => 'Doc No',
            'birthday' => 'Birthday',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[BookingClients]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookingClients()
    {
        return $this->hasMany(BookingClient::className(), ['client_id' => 'id']);
    }

    /**
     * Gets query for [[Bookings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::className(), ['id' => 'booking_id'])->viaTable('booking_client', ['client_id' => 'id']);
    }

    /**
     * Gets query for [[ExtraServiceSellings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExtraServiceSellings()
    {
        return $this->hasMany(ExtraServiceSelling::className(), ['client_id' => 'id']);
    }
}
