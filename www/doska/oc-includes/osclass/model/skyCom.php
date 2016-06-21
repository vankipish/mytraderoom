<?php if ( !defined('ABS_PATH') ) exit('ABS_PATH is not loaded. Direct access is not allowed.');

/**
 * Model database for SkyCom table
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 21.06.2016
 * Time: 15:18
 */
class skyCom extends DAO
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
        $this->setTableName('skyCom');
        $this->setPrimaryKey('com_id');
        $array_fields = array(
            'com_id',
            'com_adm',
            'com_kgol',
            'com_papa',
            'com_kto',
            'com_kogda',
            'com_email',
            'com_text',
            'com_ip'
        );
        $this->setFields($array_fields);
    }

}
    function globper($a)
    { if (isset($_POST[$a])) { $per = $_POST[$a]; $per = trim($per); $per = stripslashes($per); $per = htmlspecialchars($per); }
        if (isset($_GET[$a])) { $per = $_GET[$a]; $per = trim($per); $per = stripslashes($per); $per = htmlspecialchars($per); }
        $a = $per;
        return $a;
    }

    $act = globper('act');
    $mod = globper('mod');
    $page = globper('page');

    function russian_date() {
        $translation = array("am" => "дп", "pm" => "пп", "AM" => "ДП", "PM" => "ПП", "Monday" => "Понедельник", "Mon" => "Пн", "Tuesday" => "Вторник", "Tue" => "Вт", "Wednesday" => "Среда", "Wed" => "Ср", "Thursday" => "Четверг", "Thu" => "Чт", "Friday" => "Пятница", "Fri" => "Пт", "Saturday" => "Суббота", "Sat" => "Сб", "Sunday" => "Воскресенье", "Sun" => "Вс", "January" => "Января", "Jan" => "Янв", "February" => "Февраля", "Feb" => "Фев", "March" => "Марта", "Mar" => "Мар", "April" => "Апреля", "Apr" => "Апр", "May" => "Мая", "May" => "Мая", "June" => "Июня", "Jun" => "Июн", "July" => "Июля", "Jul" => "Июл", "August" => "Августа", "Aug" => "Авг", "September" => "Сентября", "Sep" => "Сен", "October" => "Октября", "Oct" => "Окт", "November" => "Ноября", "Nov" => "Ноя", "December" => "Декабря", "Dec" => "Дек", "st" => "ое", "nd" => "ое", "rd" => "е", "th" => "ое",);
        if (func_num_args() > 1) {
            $timestamp = func_get_arg(1);
            return strtr(date(func_get_arg(0), $timestamp), $translation);
        } else {
            return strtr(date(func_get_arg(0)), $translation);
        }
    }

    $acom = globper('acom');

    function al($a){ echo '<script type="text/javascript">$(document).ready(function() { alert("'.$a.'"); });</script>'; }

    //настройки
   
    $this->dao->select('nas_par','nas_znach');
    $this->dao->from('skynas');
    $skybasenastr = $this->dao->get();
    $skyrownastr = db2_fetch_array($skybasenastr);
    do { $$skyrownastr['nas_par'] = $skyrownastr['nas_znach']; }
    while ($skyrownastr = $skyrownastr = db2_fetch_array($skybasenastr));
    $vrem = time();

    $this -> select('user_email');
    $this->dao->from('skyusers');
    $this->dao->where('user_id', 1);
    $skybase = $this->dao->get();
    $skyrow = db2_fetch_array($skybase);
    $adm_email = $skyrow['user_email'];