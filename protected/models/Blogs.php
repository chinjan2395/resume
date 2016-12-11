<?php

class Blogs extends CActiveRecord
{
//	public $id;
//	public $title;
//	public $text;
//	public $status;
//	public $date;

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName(){
    return 'blogs';
    }


    public function getCriteria(){
        return new CDbCriteria();
    }
    /**
	 * Declares the validation rules.
	 */
    public $file;
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('title,image, text, status, date', 'required','on'=>'insert,update'),
            array('image', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true)
			// verifyCode needs to be entered correctly
		);
	}


	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
            'status' => 'Status',
            'date' => 'Date',
		);
	}
}
