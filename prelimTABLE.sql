-- Create the tables table
CREATE TABLE tables (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  table_number INT,
  status VARCHAR(255),
  location VARCHAR(255),
  capacity INT
);

-- Create the customers table
CREATE TABLE customers (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name VARCHAR(255),
  email VARCHAR(255),
  phone VARCHAR(255),
  address VARCHAR(255)
);

-- Create the reservations table
CREATE TABLE reservations (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  table_id INT,
  customer_id INT,
  reservation_date DATE,
  start_time TIME,
  end_time TIME,
  special_requests VARCHAR(255),
  staff_id INT,
  FOREIGN KEY (table_id) REFERENCES tables(id),
  FOREIGN KEY (customer_id) REFERENCES customers(id),
  FOREIGN KEY (staff_id) REFERENCES staff(id)
);

-- Create the payments table
CREATE TABLE payments (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  reservation_id INT,
  amount DECIMAL(10, 2),
  payment_date DATE,
  payment_method VARCHAR(255),
  transaction_id VARCHAR(255),
  FOREIGN KEY (reservation_id) REFERENCES reservations(id)
);

-- Create the staff table
CREATE TABLE staff (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name VARCHAR(255),
  role VARCHAR(255),
  contact_info VARCHAR(255),
  hire_date DATE,
  salary DECIMAL(10, 2)
);
