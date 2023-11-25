package main

import (
	// sql "database/sql"
	"log"
	"fmt"
	"encoding/json"
	"net/http"
	// "strings"
)

type response struct {
	Message string
}

func userLogin(w http.ResponseWriter, req *http.Request) {
	// fmt.Println(req.Body)
	decoder := json.NewDecoder(req.Body)
	w.Header().Set("Content-Type", "application/json")
	type tempUser struct {
		Login_username, Login_password string
	}

	var tmpUser tempUser
	var user User
	err := decoder.Decode(&tmpUser)
	if err != nil {
		log.Fatal(err, "decode error")
	} else {
		fmt.Println(tmpUser)
		user = User{
			Username: tmpUser.Login_username,
			Password: tmpUser.Login_password,
		}
	}

	flag, err := user.checkPasswords()
	if err != nil {
		log.Fatal(err)
	}

	if flag {
		w.WriteHeader(http.StatusOK)
		json.NewEncoder(w).Encode(&response{Message: "You are logged in!"})
	} else {
		json.NewEncoder(w).Encode(&response{Message: "Wrong passwords"}) 
	}
}

func userSignup(w http.ResponseWriter, req *http.Request) {
	decoder := json.NewDecoder(req.Body)
	w.Header().Set("Content-Type", "application/json")
	type tempUser struct {
		SU_username, password string
	}

	var tmpUser tempUser
	var user User
	err := decoder.Decode(&tmpUser)
	if err != nil {
		log.Fatal(err, "decode error")
	} else {
		fmt.Println(tmpUser)
		user = User{
			Username: tmpUser.SU_username,
			Password: tmpUser.password,
		}
	}
	
	err = user.signup()
	if err != nil {
		json.NewEncoder(w).Encode(&response{Message: "Sign up failed"})
	} else {
		w.WriteHeader(http.StatusOK)
		json.NewEncoder(w).Encode(&response{Message: "Sign up success"})
	}
}

func main() {
	fileServer := http.FileServer(http.Dir("./static")) 
    http.Handle("/", fileServer) 
	http.HandleFunc("/hello", func(w http.ResponseWriter, r *http.Request){
        fmt.Fprintf(w, "Hello!")
    })
	http.HandleFunc("/login", userLogin)
	http.HandleFunc("/signup", userSignup)
	// http.HandleFunc("/",func(wr http.ResponseWriter,req *http.Request) {
	// 	// Determine mime type based on the URL
	// 	if strings.HasSuffix(req.URL.Path,".css") {
	// 	  wr.Header().Set("Content-Type","text/css")
	// 	} 
	// 	http.StripPrefix("/static/", fileServer).ServeHTTP(wr,req)
	// })
	fmt.Printf("Starting server at port 8000\n")
	if err := http.ListenAndServe(":8000", nil); err != nil {
        log.Fatal(err)
    }
}