CREATE DATABASE chat;
USE chat;

CREATE TABLE msg (
    id INT PRIMAY KEY,
    origem VARCHAR(40),
    mensagem VARCHAR(200)
);