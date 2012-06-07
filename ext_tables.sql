#
# Table structure for table 'tx_tmcars_vehicle'
#
CREATE TABLE tx_tmcars_vehicle (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	title tinytext,
	comment tinytext,
	price_info tinytext,
        price double(11,2) DEFAULT '0.00' NOT NULL,
	fuel_con tinytext,
	fuel_in tinytext,
	fuel_out tinytext,
	co2 tinytext,
	daten text,
	equipment text,
	description text,
	number tinytext,
	images text,
	used tinyint(3) DEFAULT '0' NOT NULL,
	
	PRIMARY KEY (uid),
	KEY parent (pid)
);