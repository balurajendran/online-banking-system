CREATE TABLE User (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    phone VARCHAR(15),
    address VARCHAR(255)
);

CREATE TABLE Account (
    account_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    balance DECIMAL(10, 2) DEFAULT 0.00,
    is_frozen BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (user_id) REFERENCES User(user_id)
);

CREATE TABLE Transaction (
    transaction_id INT PRIMARY KEY AUTO_INCREMENT,
    account_id INT,
    type VARCHAR(50), -- e.g., 'deposit', 'withdraw'
    amount DECIMAL(10, 2),
    timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
    category VARCHAR(50),
    FOREIGN KEY (account_id) REFERENCES Account(account_id)
);

CREATE TABLE Budget (
    budget_id INT PRIMARY KEY AUTO_INCREMENT,
    account_id INT,
    monthly_limit DECIMAL(10, 2),
    month_year VARCHAR(7), -- format: YYYY-MM
    FOREIGN KEY (account_id) REFERENCES Account(account_id)
);

CREATE TABLE LoginSession (
    session_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    login_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    logout_time DATETIME,
    FOREIGN KEY (user_id) REFERENCES User(user_id)
);
