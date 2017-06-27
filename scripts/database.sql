CREATE TABLE users (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(30) NOT NULL,
  password VARCHAR(20) NOT NULL,
  email VARCHAR(30) NOT NULL UNIQUE,
  handle VARCHAR(20) NOT NULL UNIQUE,
  image VARCHAR(70) NOT NULL DEFAULT 'img/logo.png'
);

CREATE TABLE tweets (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  tText varchar(300) NOT NULL,
  user_id INTEGER NOT NULL,
  time DATETIME NOT NULL,
  CONSTRAINT fkyUsers FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
);

CREATE TABLE follows (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  user_id INTEGER NOT NULL,
  follows_id INTEGER NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
  FOREIGN KEY (follows_id) REFERENCES users (id) ON DELETE CASCADE
);

INSERT INTO tweets (tText, user_id, time) VALUES('Hello World!', 4, NOW());

INSERT INTO follows (user_id, follows_id) VALUES(4, 10);

SELECT u.username, u.handle, u.image, t.tText, t.time FROM users u INNER JOIN tweets t ON u.id = user_id WHERE u.handle = "dodo" OR u.id = 10 ORDER BY t.time DESC;

SELECT follows_id from follows where user_id = 4;
