<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $slug
 * @property string|null $image
 * @property string|null $description
 * @property int|null $viewed
 * @property int $created_at
 * @property int $updated_at
 * @property int $status
 *
 */
class Post extends ActiveRecord
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    const FIXED_YES = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    public function behaviors()
    {
        return [
            'sluggableBehavior' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'ensureUnique' => true
            ],
            'timestampBehavior' => ['class' => TimestampBehavior::className()],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'image'], 'required'],
            [['viewed', 'created_at', 'updated_at', 'status'], 'integer'],
            [['name', 'slug', 'image', 'description'], 'string']];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'image' => 'Image',
            'viewed' => 'Viewed',
            'created_at' => 'Created at',
            'updated_at' => 'Updated at',
            'status' => 'Status',
        ];
    }

    public function getStatusLabel()
    {
        return ArrayHelper::getValue(static::getStatuses(), $this->status);
    }

    /**
     * @return array
     */
    public static function getStatuses()
    {
        return [
            self::STATUS_ENABLED => Yii::t('post', 'Enabled'),
            self::STATUS_DISABLED => Yii::t('post', 'Disabled'),
        ];
    }

    public static function getFixedList()
    {
        return [
            self::FIXED_YES => Yii::t('post', 'Yes'),
        ];
    }

    public function getImgPath()
    {
        return 'static/posts/';
    }

    public function getErrorMessage()
    {
        return $this->getErrorSummary(true)[0];
    }

    public function getImgUrl()
    {
        return $this->getImgPath() . $this->image;
    }
}