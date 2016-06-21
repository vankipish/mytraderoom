-- 
-- Структура таблицы `skycom`
-- 

CREATE TABLE `skycom` (
  `com_id` int(11) NOT NULL auto_increment,
  `com_adm` int(1) NOT NULL default '0',
  `com_kgol` varchar(30) default NULL,
  `com_papa` int(11) NOT NULL,
  `com_kto` varchar(100) NOT NULL,
  `com_kogda` int(11) NOT NULL,
  `com_email` varchar(200) NOT NULL,
  `com_text` text NOT NULL,
  `com_ip` varchar(15) NOT NULL,
  PRIMARY KEY  (`com_id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Дамп данных таблицы `skynas`
-- 

INSERT INTO `skynas` VALUES ('', 'com_width', '700');
INSERT INTO `skynas` VALUES ('', 'com_dlina', '350');
INSERT INTO `skynas` VALUES ('', 'com_str', '7');

-- --------------------------------------------------------