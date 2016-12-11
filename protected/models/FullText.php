<?php

class FullText extends CActiveRecord
{

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName(){
    return 'fulltext';
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
		);
	}
}
