CREATE DATABASE IF NOT EXISTS dvgamer_pc;

USE dvgamer_pc;
-- Create Table DvGamer-PC
DROP TABLE IF EXISTS dvg_user;
CREATE TABLE dvg_user (
	user_id int(9) NOT NULL auto_increment,
	person_id int(13) NOT NULL default '',
	username varchar(20) NOT NULL default '',
	password varchar(32) NOT NULL default '',
	email varchar(50) NOT NULL default '',
	firstname varchar(50) NULL default '',
	lastname varchar(50) NULL default '',
	nickname varchar(20) NULL default '',
	birthday varchar(10) default NULL,
	phone varchar(11) NULL default '',
	sex varchar(1) NULL default '',
	datecreate varchar(10) default NULL,
	datevisit varchar(10) default NULL,
	PRIMARY KEY (person_id))
	ENGINE=MyISAM DEFAULT CHARSET=tis620;

DROP TABLE IF EXISTS dvg_user_contact;
CREATE TABLE dvg_user_contact (
	contact_id int(9) NOT NULL auto_increment,
	address varchar(50) NULL default '',
	amphur varchar(20) NULL default '',
	province varchar(20) NULL default '',
	zipcode int(5) NULL default '0',
	user_id int(9) NOT NULL default '0',
	PRIMARY KEY (contact_id))
	ENGINE=MyISAM DEFAULT CHARSET=tis620;

DROP TABLE IF EXISTS dvg_user_profile;
CREATE TABLE dvg_user_profile (
	user_id int(9) NOT NULL default '0',
	image_person varchar(32) NULL default '',
	cpu_id varchar(50) NULL default '',
	ram_buffer varchar(50) NULL default '',
	msn varchar(50) NULL default '',
	about_me mediumtext,
	msn varchar(50) NULL default '',
	website varchar(50) NULL default '',
	PRIMARY KEY (user_id))
	ENGINE=MyISAM DEFAULT CHARSET=tis620;

DROP TABLE IF EXISTS dvg_user_pmcomment;
CREATE TABLE dvg_user_pmcomment (
	userpm_id int(13) NOT NULL auto_increment,
	user_from int(9) NOT NULL default '0',
	user_to int(9) NOT NULL default '0',
	comments mediumtext,
	created varchar(10) default NULL,
	ip_address varchar(11) NULL default '',
	pmtrans varchar(1) NULL default '0',
	PRIMARY KEY (userpm_id))
	ENGINE=MyISAM DEFAULT CHARSET=tis620;

DROP TABLE IF EXISTS dvg_user_account;
CREATE TABLE dvg_user_account (
	person_id int(13) NOT NULL default '',
	money_total int(9) NOT NULL default '0',
	PRIMARY KEY (person_id))
	ENGINE=MyISAM DEFAULT CHARSET=tis620;

DROP TABLE IF EXISTS dvg_user_account_pay;
CREATE TABLE dvg_user_account (
	pay_id int(15) NOT NULL default '',
	person_id int(13) NOT NULL default '',
	pay_in-out varchar(1) NOT NULL default '0',
	money int(9) NOT NULL default '0',
	paydate varchar(9) NOT NULL default '0',
	PRIMARY KEY (pay_id))
	ENGINE=MyISAM DEFAULT CHARSET=tis620;