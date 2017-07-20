create table users (
  username VARCHAR(20) PRIMARY KEY,
  email VARCHAR(255) unique,
  password VARCHAR(255)
);

CREATE table items (
  user VARCHAR(20) REFERENCES users(username),
  name VARCHAR(255),
  description text(1024),
  price NUMERIC(8,2),
  link VARCHAR(255),
  image VARCHAR(255)
);