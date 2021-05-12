drop database if exists term_project;
create database term_project;
ALTER DATABASE term_project CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
use term_project;

CREATE TABLE IF NOT EXISTS userlis( 
    userid VARCHAR(255) NOT NULL, 
    email VARCHAR(255) NOT NULL, 
    password VARCHAR(255) NOT NULL,
    admin boolean NOT NULL,
    PRIMARY KEY (email)
);

create table restaurant(
    name VARCHAR(255),
    rating float,
    user_ratings_total int,
    address VARCHAR(255),
    latitude float,
    longitude float
);

DELETE FROM restaurant WHERE name='restaurant';

-- for history

-- CREATE TABLE IF NOT EXISTS history ( 
--     userid VARCHAR(255) NOT NULL,
--     city VARCHAR(4) NOT NULL,
--     district VARCHAR(6) NOT NULL,
--     trade_date int NOT NULL,
--     highest_price bigint NOT NULL,
--     lowest_price bigint NOT NULL,
--     PRIMARY KEY (userid, city, district, trade_date, highest_price, lowest_price)
-- );
