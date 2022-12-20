CREATE DATABASE license;

CREATE TABLE licenses (
  id int(11) AUTO_INCREMENT,
  `key` varchar(25) NOT NULL,
  hwid varchar(50) DEFAULT 'None',
  PRIMARY KEY(id)
)
