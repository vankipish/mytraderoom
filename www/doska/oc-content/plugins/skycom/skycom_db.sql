-- phpMyAdmin SQL Dump
-- version 2.6.1
-- http://www.phpmyadmin.net
-- 
-- Хост: localhost
-- Время создания: Мар 23 2011 г., 09:51
-- Версия сервера: 5.0.45
-- Версия PHP: 5.2.4
-- 
-- БД: `mytrader_base`
-- 

-- --------------------------------------------------------

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

-- 
-- Дамп данных таблицы `skycom`
-- 


-- --------------------------------------------------------

-- 
-- Структура таблицы `skynas`
-- 

CREATE TABLE `skynas` (
  `nas_id` int(2) NOT NULL auto_increment,
  `nas_par` varchar(15) NOT NULL,
  `nas_znach` varchar(255) NOT NULL,
  PRIMARY KEY  (`nas_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=cp1251 AUTO_INCREMENT=7 ;

-- 
-- Дамп данных таблицы `skynas`
-- 

INSERT INTO `skynas` VALUES (4, 'com_width', '700');
INSERT INTO `skynas` VALUES (5, 'com_dlina', '350');
INSERT INTO `skynas` VALUES (6, 'com_str', '7');

-- --------------------------------------------------------

-- 
-- Структура таблицы `skyusers`
-- 

CREATE TABLE `skyusers` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_icq` int(10) NOT NULL,
  `user_web` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_emailview` int(1) default '0',
  `user_login` varchar(50) NOT NULL,
  `user_pass` varchar(32) NOT NULL,
  `user_sol` char(3) NOT NULL,
  `user_tel` varchar(30) NOT NULL,
  `user_fax` varchar(30) NOT NULL,
  `user_gorod` varchar(20) NOT NULL,
  `user_obl` varchar(25) NOT NULL,
  `user_regtime` int(14) NOT NULL,
  `user_vizit` int(14) NOT NULL,
  `user_osebe` varchar(255) NOT NULL,
  `user_prava` int(1) NOT NULL default '0',
  `user_ip` varchar(15) NOT NULL,
  `user_ras` int(1) NOT NULL default '0',
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=cp1251 PACK_KEYS=0 AUTO_INCREMENT=2 ;

-- 
-- Дамп данных таблицы `skyusers`
-- 

INSERT INTO `skyusers` VALUES (1, 0, 'skyscript.ru', 'email@email.ru', 0, 'Administrator', 'f8da4ad0ffbefaccd06497bf330d94c9', 'o+p', '', '', '', '', 1047563998, 1268312603, '', 5, '127.0.0.1', 0);
