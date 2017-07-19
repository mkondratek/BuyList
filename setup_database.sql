create table users (
  username VARCHAR(32) PRIMARY KEY,
  first_name VARCHAR(255),
  last_name VARCHAR(255),
  email VARCHAR(255),
  password VARCHAR(64)
);

CREATE table items (
  user VARCHAR(32) REFERENCES users(username),
  name VARCHAR(255),
  description text(1024),
  price NUMERIC(8,2),
  link VARCHAR(255),
  image VARCHAR(255)
);