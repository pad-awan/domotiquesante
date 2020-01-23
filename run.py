#!/usr/bin/env python3
# -*- coding: utf-8 -*-

#from domoflask import app_test_OBJETDOMO_V13

from flask import Flask

app = Flask(__name__)

@app.route("/API_OBJETDOMO/Flask/domoflask/templatesV13_1.1")
def index():
    return "Hello world !!!"

if __name__=="__main__":
    app.run(debug=True)
