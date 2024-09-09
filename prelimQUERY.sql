-- Find all reservations on a specific date
SELECT *
FROM reservations
WHERE reservation_date = '2024-09-10';


-- Get customer details along with their reservation details
SELECT customers.name, customers.email, reservations.reservation_date, reservations.start_time, reservations.end_time
FROM customers
JOIN reservations ON customers.id = reservations.customer_id;

-- Count the number of reservations per table
SELECT table_id, COUNT(*) AS reservation_count
FROM reservations
GROUP BY table_id;


-- Calculate the total amount paid by each customer
SELECT customers.name, SUM(payments.amount) AS total_amount_paid
FROM customers
JOIN reservations ON customers.id = reservations.customer_id
JOIN payments ON reservations.id = payments.reservation_id
GROUP BY customers.name;


-- Find the average payment amount for reservations handled by a specific staff member
SELECT staff.name, AVG(payments.amount) AS average_payment
FROM staff
JOIN reservations ON staff.id = reservations.staff_id
JOIN payments ON reservations.id = payments.reservation_id
WHERE staff.name = 'Michael Brown'
GROUP BY staff.name;
