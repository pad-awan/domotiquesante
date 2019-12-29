#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Sun Dec 29 14:07:56 2019

@author: arnaudhub
Tutoriel pour connecter Flask à une base de donnée mySQL
https://www.youtube.com/watch?v=6L3HNyXEais

"""
#Connexion et implementation BDD
from sqlalchemy import create_engine
from sqlalchemy.sql import text
#import argparse
#~ import creds
import os,configparser # credentials:
#import sys
import pandas as pd
import json
config = configparser.ConfigParser()
config.read_file(open(os.path.expanduser("/home/arnaudhub/Bureau/OBJET_DOMOTIQUE/OBJDOMO.cnf")))
print(config.sections())

import ast

DB='OBJETDOMO_V12?charset=utf8' #.
mySQLengine = create_engine("mysql://%s:%s@%s/%s" % (config['OBJDOMO']['user'], config['OBJDOMO']['password'], config['OBJDOMO']['host'], DB))
print(mySQLengine)


from flask import Flask,render_template,request,redirect
import pymysql

import yaml

app = Flask(__name__)

#Configure db
#db = print(yaml.load(open('db.yaml')))

#app.config['MYSQL_HOST'] = db['mysql_host']
#app.config['MYSQL_USER'] = db['mysql_user']
#app.config['MYSQL_PASSWORD'] = db['mysql_password']
#app.config['MYSQL_DB'] = db['mysql_db']

#mysql = pymysql(app)

@app.route('/', methods=['GET','POST'])
def index():
    if request.method=='POST':
        #Fetch the form data
        usersDetails =request.form
        name = usersDetails['name']
        email = usersDetails['email']
        #cur = pymysql.connection.cursor()
        #cur = pymysql.connect.cursor()
        #cur = pymysql.connection.cursor()
        conn = pymysql.connect(host="localhost", user="root", passwd="", db = "Flaskapp")
        cur = conn.cursor()
        cur.execute("INSERT INTO users (name, email) VALUES(%s,%s)",(name, email))
        #pymysql.connect.commit()
        conn.commit()
        cur.close()
        return redirect('/users')

    return render_template('index.html')
@app.route('/users')
def users():
    conn = pymysql.connect(host="localhost", user="root", passwd="", db = "Flaskapp")
    cur = conn.cursor()
    resultValue = cur.execute("SELECT * FROM users")
    if resultValue > 0:
        usersDetails =request.form
        usersDetails = cur.fetchall()
        return render_template('users.html',usersDetails = usersDetails)

if __name__=='__main__':
    app.run(host='localhost',port='5000',debug=True)
