CREATE TABLE contact(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(255),
    mail VARCHAR(255),
    title VARCHAR(255),
    body TEXT NOT NULL,
    date DATETIME NOT NULL
)DEFAULT CHARACTER SET=utf8;