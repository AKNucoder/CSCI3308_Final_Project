# This is the script to create the tables inside the database
# https://www.ups.com/worldshiphelp/WS14/ENU/AppHelp/CONNECT/Address_Data_Field_Descriptions.htm - Example Lengths for field sizes for many of the attributes here
# http://php.net/manual/en/function.password-hash.php - Some PHP commands on hashing (and size of hash)
# InnoDB engine used due to better performance vs myISAM which is usually only better if there is little writing, howeever in this case, reading and writing is used frequently.

# User`s profile information
CREATE TABLE IF NOT EXISTS `user_profile` ( 
	`userId`		mediumint(10) unsigned	NOT NULL auto_increment, 
	`fullName`		varchar(35)				NOT NULL,
	`email`			varchar(50)				NOT NULL UNIQUE,
	`ps`			varchar(60)				NOT NULL,
	`userName`		varchar(25)				NOT NULL UNIQUE,
	`isDriver`		boolean					NOT NULL,
	`avatarCode`	tinyint(1)				NULL, # User avatar/pattern
	PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

# Contact information about user
CREATE TABLE IF NOT EXISTS `user_contact` ( 
	`userId`		mediumint(10) unsigned	NOT NULL auto_increment,
	`city`			varchar(50)				NOT NULL,
	`state`			varchar(25)				NOT NULL,
	`zipCode`		varchar(5)				NOT NULL,
	`phone`			varchar(10)				NOT NULL,
	PRIMARY KEY (`userId`),
	FOREIGN KEY (`userId`) REFERENCES user_profile(`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

#Details about the user's car, if the user is a driver. 
CREATE TABLE IF NOT EXISTS `user_vehicle` ( 
	`carId`			mediumint(10) 	unsigned	NOT NULL auto_increment,
	`userId` 		mediumint(10) 	unsigned 	NOT NULL,
	`make` 			varchar(35) 				NOT NULL,
	`model` 		varchar(50) 				NOT NULL,
	`color`			varchar(10)					NOT NULL,
	`seats` 		tinyint(2)		unsigned	NOT NULL,
	PRIMARY KEY (`carId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

# Store Blog post materials
CREATE TABLE IF NOT EXISTS `user_entry` ( 
	`postId`		int(10) 		unsigned					NOT NULL auto_increment,
	`userId` 		mediumint(10) 	unsigned 					NOT NULL,
	`title` 		varchar(35) 								NOT NULL,
	`text` 			varchar(600) 								NOT NULL,
	`postDate`		datetime		default current_timestamp	NOT NULL,
	`eventDate`		datetime 		default current_timestamp	NOT NULL,
	`tags`			varchar(70)									NOT NULL,
	`price`			numeric(5,2)								NOT NULL,
	PRIMARY KEY (`postId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

#INSERT INTO `user_profile` (`fullName`, `email`, `ps`,`userName`,`isDriver`,`avatarCode`) VALUES 
#INSERT INTO `user_contact` (`userId`, `city`, `state`,`zipCode`,`phone`) VALUES 
#INSERT INTO `user_vehicle` (`carId`, `userId`, `make`,`model`,`color`,`seats`) VALUES 
#INSERT INTO `user_entry` (`postId`, `userId`, `title`,`text`,`postDate`,`eventDate`,`tags`,`price`) VALUES 


