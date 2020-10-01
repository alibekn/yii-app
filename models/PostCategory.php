<?php

namespace app\models;

use app\models\Post;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "post_category".
 *
 * @property int $id
 * @property string $name
 * @property string|null $slug
 * @property string|null $icon
 * @property int|null $sort_order
 * @property int|null $status
 *
 * @property Post[] $posts
 */
class PostCategory extends ActiveRecord
{

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['sort_order', 'status'], 'integer'],
            [['name', 'slug', 'icon'], 'string', 'max' => 255],
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
            'slug' => 'Slug',
            'icon' => 'Icon',
            'sort_order' => 'Sort Order',
            'status' => 'Status'
        ];
    }

    /**
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['category_id' => 'id']);
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
            self::STATUS_ENABLED => 'Enabled',
            self::STATUS_DISABLED => 'Disabled',
        ];
    }
}