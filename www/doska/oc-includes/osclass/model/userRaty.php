<?php if ( !defined('ABS_PATH') ) exit('ABS_PATH is not loaded. Direct access is not allowed.');

/*
Copy from ItemComment table description
 */

    /**
     * Model database for os_t_rating table
     *
     */
    class userRaty extends DAO
    {
        /**
         * It references to self object: userRaty.
         * It is used as a singleton
         *
         * @access private
         * @since unknown
         * @var Item
         */
        private static $instance;

        /**
         * It creates a new userRaty object class ir if it has been created
         * before, it return the previous object
         *
         * @access public
         * @since unknown
         * @return ItemComment
         */
        public static function newInstance()
        {
            if (!self::$instance instanceof self) {
                self::$instance = new self;
            }
            return self::$instance;
        }

        /**
         * Set data related to t_item_comment table
         */
        function __construct()
        {
            parent::__construct();
            $this->setTableName('t_rating');
            $this->setPrimaryKey('r_id');
            $array_fields = array(
                'r_id',
                'r_pub_date',
                'r_executor',
                'r_rating',
                'r_comment',
                'r_of_user'
            );
            $this->setFields($array_fields);
        }

        /**
         * Searches for comments information, given an item id.
         *
         * @access public
         * @since unknown
         * @param integer $id
         * @return array
         */
        function findByItemIDAll($id)
        {
            $this->dao->select();
            $this->dao->from($this->getTableName());
            $this->dao->where('r_id', $id);
            $result = $this->dao->get();

            if ($result == false) {
                return array();
            }

            return $result->result();
        }
    }

?>