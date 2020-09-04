<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $username
 * @property string $text
 * @property string|null $created_at
 */
class Comment extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['username', 'text'], 'required'],
            [['text'], 'string'],
            [['created_at'], 'safe'],
            [['username'], 'string', 'max' => 60],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'text' => 'Text',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return string|null
     */
    public function getCreatedAt()
    {
        return date('H:i d.m.Y', strtotime($this->created_at));
    }

    /**
     * @param string|null $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

}
