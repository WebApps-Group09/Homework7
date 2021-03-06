CREATE DATABASE homework7;
CREATE USER homework7 WITH PASSWORD 'homework7';
ALTER DATABASE homework7 OWNER TO homework7;
\c homework7;

CREATE TABLE users (
  first_name text,
  last_name text,
  address text,
  dorm text,
  city text,
  state text,
  zip numeric,
  year text,
  sports text,
  quote text
);
ALTER TABLE users OWNER to homework7;
ALTER TABLE users ADD COLUMN id serial PRIMARY KEY;
ALTER TABLE users ADD COLUMN username text UNIQUE;
CREATE UNIQUE INDEX username_constraint on users (username);
ALTER TABLE users ADD COLUMN registration timestamp;

CREATE TABLE activity (
  user_id serial REFERENCES users (id),
  ip_address text,
  time_stamp timestamp
);
ALTER TABLE activity OWNER to homework7;
ALTER TABLE activity ADD COLUMN page text;

INSERT INTO users (username, registration) VALUES ('ann', CURRENT_TIMESTAMP);
UPDATE users SET first_name = 'Ann' WHERE username='ann';

SELECT id FROM users WHERE username='ann';

/*
helpful commands:
 - connect to database interface
sudo -u postgres psql postgres
psql homework7 -d homework7 -h localhost -W
  homework7

- use a database
  \c [database name]
- look at a list of tables
  \dt
- look at the table schema
  \d [table name]
- quit db interface
  \q
*/
