package main

import (
	"log"
	"database/sql"
)

func checkUsername(database *sql.DB, username string) (bool, error){
	stmt, err := database.Prepare("SELECT COUNT(*) FROM users WHERE username=?")
	if err != nil {
		log.Fatal(err)
	}
	defer stmt.Close()

	var count int 
	err = stmt.QueryRow(username).Scan(&count)
	if err != nil {
		return false, err
	}

	return count > 0, nil
}
func (user User) signup() (string, error) {
	connection := initConnection()
	var message string

	hashedPassword, err := HashPassword(user.Password)
	if err != nil {
		log.Fatal(err)
	}

	if flag, err := checkUsername(connection, user.Username); flag {
		message = "Username already exists"
		return message, err
	}
	_, err = connection.Exec("INSERT INTO users (username, passwords) VALUES (?, ?)", user.Username, hashedPassword)
	message = "Sign up success"
	connection.Close()
	return message, err
}