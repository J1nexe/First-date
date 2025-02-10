CREATE DATABASE IF NOT EXISTS date_planner;

USE date_planner;

CREATE TABLE IF NOT EXISTS date_plans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    selected_date DATE NOT NULL,
    activities TEXT NOT NULL,
    restaurant VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
); 