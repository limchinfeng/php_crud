
## Instruction

1. Create a database and run the below SQL to create a table and insert some dummy data
```
CREATE TABLE clients (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR (100) NOT NULL,
    email VARCHAR (200) NOT NULL UNIQUE,
    phone VARCHAR(20) NULL,
    address VARCHAR(200) NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO clients (name, email, phone, address)
VALUES
('Bill Gates', 'bill.gates@microsoft.com', '+123456789', 'New York, USA'),
('Elon Musk', 'elon.musk@spacex.com', '+111222333', 'Florida, USA'),
('Will Smith', 'will.smith@gmail.com', '+111333555', 'California, USA'),
('Bob Marley', 'bob@gmail.com', '+111555999', 'Texas, USA'),
('Cristiano Ronaldo', 'cristiano.ronaldo@gmail.com', '+32447788993', 'Manchester, England'),
('Boris Johnson', 'boris.johnson@gmail.com', '+4499778855', 'London, England');
```
<br />

2. Go to config.php to edit your details
```
/*  Database Configuration Settings  */
$servername = "";  // Server address
$username = "";    // MySQL username
$password = "";    // MySQL password (empty if not set)
$dbname = "";      // Your DB name

/* Your folder name */
$base_url="/EXAMPLE"
```
<br />

3. Happy Playing :)
