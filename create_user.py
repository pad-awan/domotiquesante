#!/usr/bin/env python3
# -*- coding: utf-8 -*-

"""
Created on Sun Dec 29 14:07:56 2019

@author: arnaudhub
Tutoriel pour créer un user
https://pythontic.com/database/mysql/create%20user
"""

# ----- Example Python program to create users in MySQL server -----

import pymysql

# Define a method to create a database connection
def getDatabaseConnection(ipaddress, usr, passwd, charset, curtype):
    sqlCon  = pymysql.connect(host=ipaddress, user=usr, password=passwd, charset=charset, cursorclass=curtype);
    return sqlCon;


# Define a method to create MySQL users
def createUser(cursor, userName, password,
               querynum=0,
               updatenum=0,
               connection_num=0):
    try:
        sqlCreateUser = "CREATE USER '%s'@'localhost' IDENTIFIED BY '%s';"%(userName, password);
        cursor.execute(sqlCreateUser);
    except Exception as Ex:
        print("Error creating MySQL User: %s"%(Ex));

# Connection parameters and access credentials
ipaddress   = "127.0.0.1";  # MySQL server is running on local machine
usr         = "root";
passwd      = "";
charset     = "utf8mb4";
curtype    = pymysql.cursors.DictCursor;

mySQLConnection = getDatabaseConnection(ipaddress, usr, passwd, charset, curtype);
mySQLCursor     = mySQLConnection.cursor();

userName = input("Saisir le username: ")
password = input("Saisir le mot de passe :")

#createUser(mySQLCursor, "visiteur", "visiteur");

mySqlListUsers = "select host, user from mysql.user;";
mySQLCursor.execute(mySqlListUsers);

# Fetch all the rows
userList = mySQLCursor.fetchall();
print("List of users:");
for user in userList:
    print(user);


if userName in userList:
    print(userName,"existe déjà")
else:
    createUser(mySQLCursor, userName,password);
    print("le username ",userName, " est créé :")

# Accorder des privileges par username
def grantprivileges(cursor,userName,host):
    try:
        cursor.execute("""GRANT ALL PRIVILEGES ON * TO userName@host;""");
        setpass = """SET PASSWORD FOR ‘%s’@’%s’ = PASSWORD(‘%s’)” %(userName,host, mkpass)""";
        results = cursor.execute(setpass)
        print("Grantings of privilege" ,results)
        cursor.execute(mySqlgrantUsers);
        sqlCon.commit()
# Fetch all the rows

#        cursor.execute("""USE `mysql`;""");

#        cursor.execute("""SELECT User,Password FROM mysql.user;""");
#        sqlCon.commit()
    except Exception as Ex:
        print("Error creating MySQL Privilege: %s"%(Ex));

userName = input("Saisir le username: ");
host = input("Saisir le host :");
#cursor = cursor.execute(mySqlgrantUsers);
#grantprivileges(cursor,userName,host)
mySqlgrantUsers = "SELECT User,Password,plugin FROM mysql.user;";
mySQLCursor.execute(mySqlgrantUsers)


grantList = mySQLCursor.fetchall();
print("List of grant:");
for grant in grantList:
    print(grant);

mySQLschema = "SELECT user,host,db,command FROM information_schema.processlist;";
mySQLCursor.execute(mySQLschema)
#fetch all the rows
schemaList = mySQLCursor.fetchall();
print("List of schema:");
for grant in schemaList:
    print(grant);

#def dropprivileges(cursor,userName,host):
#    try:
#        cursor.execute("""DROP ALL PRIVILEGES ON * TO userName@host;""");
#        setpass = """SET PASSWORD FOR ‘%s’@’%s’ = PASSWORD(‘%s’)” %(userName,host, mkpass)""";
#        results = cursor.execute(setpass)
#        print("Droppings of privilege" ,results)
#        cursor.execute(mySqlgrantUsers);
#        sqlCon.commit()
