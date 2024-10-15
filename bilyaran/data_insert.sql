-- Insert sample data into tables
INSERT INTO `tables` (`table_number`, `status`, `location`, `capacity`) VALUES
(1, 'available', 'Main Hall', 4),
(2, 'occupied', 'Main Hall', 4),
(3, 'available', 'VIP Room', 6),
(4, 'maintenance', 'Main Hall', 4),
(5, 'available', 'VIP Room', 6),
(6, 'available', 'Main Hall', 4),
(7, 'occupied', 'VIP Room', 6),
(8, 'available', 'Main Hall', 4);

-- Insert sample data into customers
INSERT INTO `customers` (`name`, `email`, `phone`, `address`) VALUES
('John Doe', 'john.doe@example.com', '123-456-7890', '123 Main St'),
('Jane Smith', 'jane.smith@example.com', '098-765-4321', '456 Elm St'),
('Alice Johnson', 'alice.johnson@example.com', '555-123-4567', '789 Oak St'),
('Bob Williams', 'bob.williams@example.com', '321-654-9870', '321 Pine St'),
('Emily Davis', 'emily.davis@example.com', '654-321-0987', '654 Maple St'),
('Chris Martin', 'chris.martin@example.com', '789-012-3456', '789 Birch St');

-- Insert sample data into staff
INSERT INTO `staff` (`name`, `role`, `contact_info`, `hire_date`, `salary`) VALUES
('Michael Brown', 'Manager', 'michael.brown@example.com', '2020-01-15', 50000.00),
('Sarah Davis', 'Assistant', 'sarah.davis@example.com', '2021-03-22', 35000.00);

-- Insert sample data into reservations
INSERT INTO `reservations` (`table_id`, `customer_id`, `reservation_date`, `start_time`, `end_time`, `special_requests`, `staff_id`) VALUES
(1, 1, '2024-09-08', '14:00', '16:00', 'None', 1),
(2, 2, '2024-09-08', '15:00', '17:00', 'None', 2),
(3, 3, '2024-09-09', '18:00', '20:00', 'Birthday', 1),
(6, 4, '2024-09-10', '14:00', '16:00', 'Anniversary', 2),
(7, 5, '2024-09-10', '15:00', '17:00', 'None', 1),
(8, 6, '2024-09-11', '18:00', '20:00', 'None', 2);

-- Insert sample data into payments
INSERT INTO `payments` (`reservation_id`, `amount`, `payment_date`, `payment_method`, `transaction_id`) VALUES
(1, 50.00, '2024-09-08', 'Credit Card', 'TXN12345'),
(2, 60.00, '2024-09-08', 'Cash', 'TXN12346'),
(3, 70.00, '2024-09-09', 'Credit Card', 'TXN12347'),
(4, 55.00, '2024-09-10', 'Credit Card', 'TXN12348'),
(5, 65.00, '2024-09-10', 'Cash', 'TXN12349'),
(6, 75.00, '2024-09-11', 'Credit Card', 'TXN12350');
