CREATE TABLE `tables` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `table_number` INT(11) DEFAULT NULL,
  `status` VARCHAR(255) DEFAULT NULL,
  `location` VARCHAR(255) DEFAULT NULL,
  `capacity` INT(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `customers` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) DEFAULT NULL,
  `email` VARCHAR(255) DEFAULT NULL,
  `phone` VARCHAR(255) DEFAULT NULL,
  `address` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `reservations` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `table_id` INT(11) DEFAULT NULL,
  `customer_id` INT(11) DEFAULT NULL,
  `reservation_date` DATE DEFAULT NULL,
  `start_time` TIME DEFAULT NULL,
  `end_time` TIME DEFAULT NULL,
  `special_requests` VARCHAR(255) DEFAULT NULL,
  `staff_id` INT(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `table_id` (`table_id`),
  KEY `customer_id` (`customer_id`),
  KEY `staff_id` (`staff_id`),
  CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`),
  CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `reservations_ibfk_3` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`)
);

CREATE TABLE `payments` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `reservation_id` INT(11) DEFAULT NULL,
  `amount` DECIMAL(10,2) DEFAULT NULL,
  `payment_date` DATE DEFAULT NULL,
  `payment_method` VARCHAR(255) DEFAULT NULL,
  `transaction_id` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reservation_id` (`reservation_id`),
  CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`)
);

CREATE TABLE `staff` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) DEFAULT NULL,
  `role` VARCHAR(255) DEFAULT NULL,
  `contact_info` VARCHAR(255) DEFAULT NULL,
  `hire_date` DATE DEFAULT NULL,
  `salary` DECIMAL(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
);
