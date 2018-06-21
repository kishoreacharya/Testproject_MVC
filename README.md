# Testproject_MVC
This is an simple message handling PHP project developed in MVC OOPS standard method & PDO DB connection.

In this project it will displays all messages and message body contains header and description.

Setup steps: 
1) Please configure database name,username and password in Config directory DBConnection class file.
2) Create table messages as shown below

Table structure for table `messages`

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `message_title` varchar(100) NOT NULL,
  `message_description` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


Dumping data for table `messages` if needed

INSERT INTO `messages` (`id`, `message_title`, `message_description`) VALUES
(1, 'Rubrik1', 'description 1 testttt  test '),
(2, 'test 2', 'test 2'),
(4, 'test 3', 'test 3333');
