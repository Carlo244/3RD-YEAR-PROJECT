CREATE TABLE applicant (
    applicant_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) DEFAULT NULL,
    last_name VARCHAR(50) DEFAULT NULL,
    email VARCHAR(100) DEFAULT NULL,
    phone_number VARCHAR(20) DEFAULT NULL,
    position_applied VARCHAR(50) DEFAULT NULL,
    application_date DATE DEFAULT current_timestamp(),
    created_by VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    updated_by VARCHAR(50), ADD COLUMN,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;
);

CREATE TABLE manager (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(255) ,
    lastname VARCHAR(255) ,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO Applicants (first_name, last_name, email, phone_number, position_applied, application_date) VALUES 
('Alice', 'Wong', 'alice.wong@example.com', '123-456-7890', 'Pharmacy Technician', '2024-01-05'),
('Bob', 'Johnson', 'bob.johnson@example.com', '234-567-8901', 'Pharmaceutical Sales Representative', '2024-01-15'),
('Carol', 'Smith', 'carol.smith@example.com', '345-678-9012', 'Clinical Research Coordinator', '2024-01-25'),
('David', 'Brown', 'david.brown@example.com', '456-789-0123', 'Pharmacy Technician', '2024-02-05'),
('Eva', 'Davis', 'eva.davis@example.com', '567-890-1234', 'Pharmaceutical Sales Representative', '2024-02-15'),
('Frank', 'Wilson', 'frank.wilson@example.com', '678-901-2345', 'Clinical Research Coordinator', '2024-02-25'),
('Grace', 'Lee', 'grace.lee@example.com', '789-012-3456', 'Pharmacy Technician', '2024-03-05'),
('Harry', 'Garcia', 'harry.garcia@example.com', '890-123-4567', 'Pharmaceutical Sales Representative', '2024-03-15'),
('Ivy', 'Martinez', 'ivy.martinez@example.com', '901-234-5678', 'Clinical Research Coordinator', '2024-03-25'),
('Jack', 'Lopez', 'jack.lopez@example.com', '012-345-6789', 'Pharmacy Technician', '2024-04-05'),
('Kathy', 'Harris', 'kathy.harris@example.com', '123-456-7890', 'Pharmaceutical Sales Representative', '2024-04-15'),
('Liam', 'Clark', 'liam.clark@example.com', '234-567-8901', 'Clinical Research Coordinator', '2024-04-25'),
('Mona', 'Lewis', 'mona.lewis@example.com', '345-678-9012', 'Pharmacy Technician', '2024-05-05'),
('Nathan', 'Walker', 'nathan.walker@example.com', '456-789-0123', 'Pharmaceutical Sales Representative', '2024-05-15'),
('Olivia', 'Hall', 'olivia.hall@example.com', '567-890-1234', 'Clinical Research Coordinator', '2024-05-25'),
('Paul', 'Allen', 'paul.allen@example.com', '678-901-2345', 'Pharmacy Technician', '2024-06-05'),
('Quincy', 'Young', 'quincy.young@example.com', '789-012-3456', 'Pharmaceutical Sales Representative', '2024-06-15'),
('Rachel', 'Hernandez', 'rachel.hernandez@example.com', '890-123-4567', 'Clinical Research Coordinator', '2024-06-25'),
('Steve', 'King', 'steve.king@example.com', '901-234-5678', 'Pharmacy Technician', '2024-07-05'),
('Tina', 'Wright', 'tina.wright@example.com', '012-345-6789', 'Pharmaceutical Sales Representative', '2024-07-15');
