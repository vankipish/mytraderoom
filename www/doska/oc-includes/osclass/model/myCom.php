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
    /**
     * It references to self object: MyCom.
     * It is used as a singleton
     *
     * @access private
     * @since unknown
     * @var Item
     */
    private static $instance;

    /**
     * It creates a new MyCom object class ir if it has been created
     * before, it return the previous object
     *
     * @access public
     * @since unknown
     * @return MyCom
     */
    public static function newInstance()
    {
        if( !self::$instance instanceof self ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * Set data related to MyCom table
     */
    function __construct()
    {
        parent::__construct();
        $this->setTableName('t_comment_comment');
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
            'parent_com_id'
        );
        $this->setFields($array_fields);
    }

    function findByItemIDAll($id)
    {
        $this->dao->select();
        $this->dao->from($this->getTableName());
        $this->dao->where('com_id', $id);
        $result = $this->dao->get();

        if ($result == false) {
            return array();
        }

        return $result->result();
    }

    function AllTexts($parentCommId)
    {
        $this->dao->select();
        $this->dao->from($this->getTableName());
        $this->dao->where('parent_com_id', $parentCommId);
        $result = $this->dao->get();
        $resArr = $result->result();
        if (empty($resArr))
            return 0;
        else
            $AllComments = array();
        foreach ($resArr as $comments)
            array_push($AllComments,$comments['com_text']);
        return $AllComments;
    }

    function allComments($parentCommId)
    {
        $this->dao->select();
        $this->dao->from($this->getTableName());
        $this->dao->where('parent_com_id', $parentCommId);
        $result = $this->dao->get();
        $this->dao->orderBy("pub_date",'DESC');
        $resArr = $result->result();
        if (empty($resArr))
            return 0;
        else
        return $resArr;
    }
    
}
?>
    