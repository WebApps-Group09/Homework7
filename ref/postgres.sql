sudo -u postgres psql postgres

CREATE DATABASE homework7;
CREATE DATABASE
postgres=# CREATE USER homework7 WITH PASSWORD 'homework7';
CREATE ROLE
postgres=# ALTER DATABASE homework7 OWNER TO homework7;
ALTER DATABASE
postgres=# ALTER TABLE users OWNER to homework7;
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

ALTER TABLE users
ADD COLUMN id SERIAL PRIMARY KEY;

ALTER TABLE users
ADD COLUMN username text UNIQUE;

CREATE UNIQUE INDEX username_constraint on users (username);

ALTER TABLE users
ADD COLUMN registration timestamp;
