<?php if ( !defined('ABS_PATH') ) exit('ABS_PATH is not loaded. Direct access is not allowed.');

/**
 * Model database for myCom table
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 23.06.2016
 * Time: 23:18
 */
class myCom extends DAO
{
    private static $instance;

    /**
     * It creates a new skyCom object class ir if it has been created
     * before, it return the previous object
     *
     * @access public
     * @since unknown
     * @return ItemComment
     */
    public static function newInstance()
    {
        if( !self::$instance instanceof self ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * Set data related to skyCom table
     */
    function __construct()
    {
        parent::__construct();
        $this->setTableName('oc_t_comment_comment');
        $this->setPrimaryKey('com_id');
        $array_fields = array(
            'com_id',
            'item_id',
            'pub_date',
            'author_name',
            'author_email',
            'author_phone',
            'show_phone',
            'com_text',
            'b_enabled',
            'author_id',
        );
        $this->setFields($array_fields);
    }

}
    