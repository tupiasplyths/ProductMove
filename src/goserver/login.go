package main

import (
	"log"
	"database/sql"
	_ "github.com/go-sql-driver/mysql"
)

type User struct {
	Username string
	Password string
}

type LoginValidation interface {
	checkPasswords()
	signup()
}

func (user User) checkPasswords() (bool, error) {
	database := initConnection()
	log.Println("connected to database")
	stmt, err := database.Prepare("SELECT passwords FROM users WHERE username=?")
	if err != nil {
        log.Fatal(err)
    }
	defer stmt.Close()
	var hashedPassword string
	err = stmt.QueryRow(user.Username).Scan(&hashedPassword)
	if err != nil {
		if err == sql.ErrNoRows {
			log.Fatal("User not found")
		} 
		return false, err
	}

	check := CheckPasswordHash(user.Password, hashedPassword)
	log.Println("passwords checked")
	database.Close()
	return check, nil
}