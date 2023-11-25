package main

import (
	"log"
	"database/sql"
	// "github.com/go-sql-driver/mysql"
    _ "github.com/denisenkom/go-mssqldb"
)

func initConnection() *sql.DB {
	config := "server=TUPI;user id=root;password=admin;port=1433;database=productmove"
	db, err := sql.Open("mssql", config)
	if err != nil {
		log.Fatal(err)
	}
	return db
} 