CREATE TABLE scroll_tracking (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    scroll_position INT,
    section_name VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE scroll_tracking
ADD COLUMN user_ip VARCHAR(45) AFTER user_id;