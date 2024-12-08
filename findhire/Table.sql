CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('APPLICANT', 'HR') NOT NULL
);


CREATE TABLE JobPosts (
    job_id INT AUTO_INCREMENT PRIMARY KEY,
    job_title VARCHAR(255) NOT NULL,
    job_description TEXT NOT NULL,
    date_posted DATE DEFAULT CURRENT_DATE;
    posted_by INT,
    FOREIGN KEY (posted_by) REFERENCES Users(user_id)
);


CREATE TABLE Applications (
    application_id INT AUTO_INCREMENT PRIMARY KEY,
    job_id INT,
    applicant_id INT,
    applicant_name VARCHAR(255),
    application_status ENUM('PENDING', 'ACCEPTED', 'REJECTED') DEFAULT 'PENDING',
    application_message TEXT,
    resume_path VARCHAR(255),
    FOREIGN KEY (job_id) REFERENCES JobPosts(job_id),
    FOREIGN KEY (applicant_id) REFERENCES Users(user_id)
);


CREATE TABLE Messages (
    message_id INT AUTO_INCREMENT PRIMARY KEY,
    sender_id INT,
    recipient_id INT,
    message_content TEXT NOT NULL,
    sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sender_id) REFERENCES Users(user_id),
    FOREIGN KEY (recipient_id) REFERENCES Users(user_id)
);
