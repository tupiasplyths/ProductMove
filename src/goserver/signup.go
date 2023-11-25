package main

import (
	"log"
)

func (user User) signup() error {
	connection := initConnection()

	hashedPassword, err := HashPassword(user.Password)
	if err != nil {
		log.Fatal(err)
	}

	_, err = connection.Exec("INSERT INTO users (username, passwords) VALUES (?, ?)", user.Username, hashedPassword)
	connection.Close()
	return err
}