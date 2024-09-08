-- Insert sample data into tables
INSERT INTO tables (table_number, status, location) VALUES
(1, 'available', 'Main Hall'),
(2, 'occupied', 'Main Hall'),
(3, 'available', 'VIP Room'),
(4, 'maintenance', 'Main Hall'),
(5, 'available', 'VIP Room'),
(6, 'available', 'Main Hall'),
(7, 'occupied', 'VIP Room'),
(8, 'available', 'Main Hall');

INSERT INTO customers (name, email, phone) VALUES
('John Doe', 'john.doe@example.com', '123-456-7890'),
('Jane Smith', 'jane.smith@example.com', '098-765-4321'),
('Alice Johnson', 'alice.johnson@example.com', '555-123-4567'),
('Bob Williams', 'bob.williams@example.com', '321-654-9870'),
('Emily Davis', 'emily.davis@example.com', '654-321-0987'),
('Chris Martin', 'chris.martin@example.com', '789-012-3456');

INSERT INTO reservations (table_id, customer_id, reservation_date, start_time, end_time) VALUES
(1, 1, '2024-09-08', '14:00', '16:00'),
(2, 2, '2024-09-08', '15:00', '17:00'),
(3, 3, '2024-09-09', '18:00', '20:00'),
(6, 4, '2024-09-10', '14:00', '16:00'),
(7, 5, '2024-09-10', '15:00', '17:00'),
(8, 6, '2024-09-11', '18:00', '20:00');

INSERT INTO payments (reservation_id, amount, payment_date, payment_method) VALUES
(1, 50.00, '2024-09-08', 'Credit Card'),
(2, 60.00, '2024-09-08', 'Cash'),
(3, 70.00, '2024-09-09', 'Credit Card'),
(4, 55.00, '2024-09-10', 'Credit Card'),
(5, 65.00, '2024-09-10', 'Cash'),
(6, 75.00, '2024-09-11', 'Credit Card');

INSERT INTO staff (name, role, contact_info) VALUES
('Michael Brown', 'Manager', 'michael.brown@example.com'),
('Sarah Davis', 'Assistant', 'sarah.davis@example.com');
