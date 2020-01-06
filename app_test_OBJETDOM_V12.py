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
#import pandas as pd
import json
config = configparser.ConfigParser()
config.read_file(open(os.path.expanduser("~/Bureau/OBJET_DOMOTIQUE/OBJDOMO.cnf")))
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

@app.route('/API_OBJETDOMO/Flask/templates/home', methods=['GET','POST'])
def index():
    if request.method=='POST':
        #Fetch the form data
        usersDetails =request.form
        #PRS_ID = usersDetails['PRS_ID']
        PRS_NOM = usersDetails['PRS_NOM']
        PRS_PRENOM = usersDetails['PRS_PRENOM']
        TTR_ID = usersDetails['TTR_ID']
        AUTH_ID = usersDetails['AUTH_ID']
        PRS_DATENAISSANCE = usersDetails['PRS_DATENAISSANCE']
        PRS_DEBCONTRAT = usersDetails['PRS_DEBCONTRAT']
        PRS_TEL1 = usersDetails['PRS_TEL1']
        PRS_TEL2 = usersDetails['PRS_TEL2']
        PRS_MAIL1 = usersDetails['PRS_MAIL1']
        PRS_MAIL2 = usersDetails['PRS_MAIL2']
        PRS_NOTES = usersDetails['PRS_NOTES']
        STT_ID = usersDetails['STT_ID']
        AUT_ID = usersDetails['AUT_ID']
        #cur = pymysql.connection.cursor()
        #cur = pymysql.connect.cursor()
        #cur = pymysql.connection.cursor()
        conn = pymysql.connect(host="localhost", user="root", passwd="", db = "OBJETDOMO_V12")
        cur = conn.cursor()
        cur.execute("INSERT INTO TE_PERSONNE_PRS(PRS_NOM,PRS_PRENOM,TTR_ID,AUTH_ID,PRS_DATENAISSANCE,PRS_DEBCONTRAT,PRS_TEL1,PRS_TEL2,PRS_MAIL1,PRS_MAIL2,PRS_NOTES,STT_ID,AUT_ID) VALUES(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",(PRS_NOM,PRS_PRENOM,TTR_ID,AUTH_ID,PRS_DATENAISSANCE,PRS_DEBCONTRAT,PRS_TEL1,PRS_TEL2,PRS_MAIL1,PRS_MAIL2,PRS_NOTES,STT_ID,AUT_ID))
        #pymysql.connect.commit()
        conn.commit()
        cur.close()
        return 'Le contact a bien ajouté à la base de contact'
        data = cur.fetchall()
        print('{}'.format(data))
        #return redirect('/users')
    #return render_template('index.php')
    #return render_template('index_OBJETDOM_V12.html')
    return render_template('index.php')

@app.route('/API_OBJETDOMO/Flask/templates/lister')
def lister():
    conn = pymysql.connect(host="localhost", user="root", passwd="", db = "OBJETDOMO_V12")
    cur = conn.cursor()
    resultValue = cur.execute("SELECT * FROM TE_PERSONNE_PRS ORDER BY PRS_NOM ASC")
    if resultValue > 0:
        usersDetails = request.form
        usersDetails = cur.fetchall()
        return render_template('users.html',usersDetails = usersDetails)

if __name__=='__main__':
    app.run(host='127.0.0.1',port='5000',debug=True)
