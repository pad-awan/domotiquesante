#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Thu Jan 09 00:04:07 2020

@author: arnaudhub
"""
from sqlalchemy import create_engine
from sqlalchemy.sql import text
import configparser,os
from urllib import parse

#import sql.connector

config = configparser.ConfigParser()
config.read_file(open(os.path.expanduser("~/Bureau/OBJDOMO.cnf")))

DB = "OBJETDOMO_V13_1.1?charset=utf8"
#TBL = "Ville"
CNF="OBJDOMO"

engine = create_engine("mysql://%s:%s@%s/%s" % (config[CNF]['user'], parse.quote_plus(config[CNF]['password']), config[CNF]['host'], DB))
user = config['OBJDOMO']['user']
password=config['OBJDOMO']['password']


import mysql.connector
from mysql.connector import Error

try:
    connection = mysql.connector.connect(host="127.0.0.1",
                                         database="OBJETDOMO_V13_1.1",
                                         user=user,
                                         password=password)

    cursor = connection.cursor()


    cursor.execute("""START TRANSACTION;""")
    cursor.execute("""USE `OBJETDOMO_V13_1.1`;""")

    type_adresses = [{"TAD_LIBELLE":"PRINCIPALE"},
                    {"TAD_LIBELLE":"SECONDAIRE"},
                    {"TAD_LIBELLE":"VISITEUR"}]

    for row in type_adresses:
        cursor.execute("""INSERT INTO `T_A_TYPE_ADRESSE_TAD` (`TAD_LIBELLE`) VALUES (%(TAD_LIBELLE)s);""",row)
        connection.commit()
    print('Les différents types d/adresse sont créés')

    GENRE = [{"GEN_LIBELLE":"HOMME"},
            {"GEN_LIBELLE":"FEMME"},
            {"GEN_LIBELLE":"AUTRE"}]

    for row in GENRE:
        cursor.execute("""INSERT INTO `T_R_GENRE_GEN` (`GEN_LIBELLE`) VALUES (%(GEN_LIBELLE)s);""",row)
    print('Les différents genres sont créés')

    statut = [{"STT_LIBELLE":"BENEFICIAIRE","STT_TYPE":"RESIDANT"},
              {"STT_LIBELLE":"SOIGNANT","STT_TYPE":"VISITEUR"},
              {"STT_LIBELLE":"AIDANT","STT_TYPE":"VISITEUR"},
              {"STT_LIBELLE":"TECHNICIEN_EXTERNE","STT_TYPE":"VISITEUR"},
              {"STT_LIBELLE":"TECHNICIEN_INTERNE","STT_TYPE":"VISITEUR"},
              {"STT_LIBELLE":"COLOCATAIRE","STT_TYPE":"RESIDANT"}
              ]
    for row in statut:
        cursor.execute("""INSERT INTO `T_A_STATUT_STT` (`STT_LIBELLE`, `STT_TYPE`) VALUES (%(STT_LIBELLE)s,%(STT_TYPE)s);""",row)
    print('Les différents statuts de personnes sont créés')

    autonomies =[{"AUT_DEPENDANCE":"GIR1","AUT_DEFINITION":"Présence continue nécessaire"},
                 {"AUT_DEPENDANCE":"GIR2","AUT_DEFINITION":"Assistance requise dans la plupart des activités de la vie quotidienne ou surveillance permanente"},
                 {"AUT_DEPENDANCE":"GIR3","AUT_DEFINITION":"Aide pour les soins corporels, plusieurs fois par jour"},
                 {"AUT_DEPENDANCE":"GIR4","AUT_DEFINITION":"Aide pour la toilette et l’habillage, ou aide pour les soins corporels et les repas"},
                 {"AUT_DEPENDANCE":"GIR5","AUT_DEFINITION":"Aide ponctuelle pour la toilette, la préparation des repas et le ménage"},
                 {"AUT_DEPENDANCE":"GIR6","AUT_DEFINITION":"Personne autonome"}
                 ]
    for row in autonomies:
        cursor.execute("""INSERT INTO `T_A_AUTONOMIE_AUT` (`AUT_DEPENDANCE`,`AUT_DEFINITION`) VALUES (%(AUT_DEPENDANCE)s,%(AUT_DEFINITION)s);""",row)
    print('Les différents statuts d/ autonomie sont créés')

    produit =[{"TPDT_CATEGORIE":"ASSISTANT_VOCAL"},
              {"TPDT_CATEGORIE":"BANDEAU_LUMINEUX"},
              {"TPDT_CATEGORIE":"BRACELET"},
              {"TPDT_CATEGORIE":"BOUTON_DECLENCHEMENT"},
              {"TPDT_CATEGORIE":"CAMERA"},
              {"TPDT_CATEGORIE":"CAPTEUR_CONSO_ELECT"},
              {"TPDT_CATEGORIE":"CAPTEUR_OUVERTURE"},
              {"TPDT_CATEGORIE":"CONTROLEUR_VANNE"},
              {"TPDT_CATEGORIE":"DETECTEUR_CHUTE"},
              {"TPDT_CATEGORIE":"DETECTEUR_FUMEE"},
              {"TPDT_CATEGORIE":"DETECTEUR_GAZ"},
              {"TPDT_CATEGORIE":"DETECTEUR_PRODUIT"},
              {"TPDT_CATEGORIE":"DETECTEUR_INONDATION"},
              {"TPDT_CATEGORIE":"DETECTEUR_MOUVEMENT"},
              {"TPDT_CATEGORIE":"PRISE_ELECTRIQUE"},
              {"TPDT_CATEGORIE":"SERRURE_CONNECTEE"},
              {"TPDT_CATEGORIE":"VEILLEUSE"}
              ]

    for row in produit:
        cursor.execute("""INSERT INTO `T_R_TYPEPRODUIT_TPDT` (`TPDT_CATEGORIE`) VALUES (%(TPDT_CATEGORIE)s);""",row)
    print('Les différents produits sont créés')

    localisation =[{"LOC_LIBELLE":"ENTREE","LOC_TYPE":"PIECE","LOC_NOTES":""},
                   {"LOC_LIBELLE":"CUISINE","LOC_TYPE":"PIECE","LOC_NOTES":""},
                   {"LOC_LIBELLE":"SALLE_BAIN","LOC_TYPE":"PIECE","LOC_NOTES":""},
                   {"LOC_LIBELLE":"TOILETTES","LOC_TYPE":"PIECE","LOC_NOTES":""},
                   {"LOC_LIBELLE":"COULOIR","LOC_TYPE":"PIECE","LOC_NOTES":""},
                   {"LOC_LIBELLE":"ESCALIER_HAUT","LOC_TYPE":"PIECE","LOC_NOTES":""},
                   {"LOC_LIBELLE":"ESCALIER_BAS","LOC_TYPE":"PIECE","LOC_NOTES":""},
                   {"LOC_LIBELLE":"GARAGE","LOC_TYPE":"PIECE","LOC_NOTES":""},
                   {"LOC_LIBELLE":"CHAMBRE","LOC_TYPE":"PIECE","LOC_NOTES":""},
                   {"LOC_LIBELLE":"SALON","LOC_TYPE":"PIECE","LOC_NOTES":""},
                   {"LOC_LIBELLE":"SALON_MANGER","LOC_TYPE":"PIECE","LOC_NOTES":""},
                   {"LOC_LIBELLE":"CAVE","LOC_TYPE":"PIECE","LOC_NOTES":""},
                   {"LOC_LIBELLE":"VERANDA","LOC_TYPE":"PIECE","LOC_NOTES":""},
                   {"LOC_LIBELLE":"REFRIGERATEUR","LOC_TYPE":"ELEMENT","LOC_NOTES":""},
                   {"LOC_LIBELLE":"CONGELATEUR","LOC_TYPE":"ELEMENT","LOC_NOTES":""},
                   {"LOC_LIBELLE":"PORTE","LOC_TYPE":"ELEMENT","LOC_NOTES":""},
                   {"LOC_LIBELLE":"FENETRE","LOC_TYPE":"ELEMENT","LOC_NOTES":""},
                   {"LOC_LIBELLE":"CHEMINEE","LOC_TYPE":"ELEMENT","LOC_NOTES":""},
                   {"LOC_LIBELLE":"MUR","LOC_TYPE":"ELEMENT","LOC_NOTES":""},
                   {"LOC_LIBELLE":"CLOISON","LOC_TYPE":"ELEMENT","LOC_NOTES":""},
                   {"LOC_LIBELLE":"PLAFOND","LOC_TYPE":"ELEMENT","LOC_NOTES":""},
                   {"LOC_LIBELLE":"TOIT","LOC_TYPE":"ELEMENT","LOC_NOTES":""},
                   {"LOC_LIBELLE":"PLAQUE_ELECTRIQUE","LOC_TYPE":"ELEMENT","LOC_NOTES":""},
                   {"LOC_LIBELLE":"GAZINIERE","LOC_TYPE":"ELEMENT","LOC_NOTES":""},
                   {"LOC_LIBELLE":"PLACARD","LOC_TYPE":"ELEMENT","LOC_NOTES":""}
                 ]

    for row in localisation:
        cursor.execute("""INSERT INTO `T_E_LOCALISATIONPRODUIT_LOC` (`LOC_LIBELLE`,`LOC_TYPE`,`LOC_NOTES`) VALUES (%(LOC_LIBELLE)s,%(LOC_TYPE)s,%(LOC_NOTES)s);""",row)
    print('Les différentes localisations sont créées')

    typeintervention=[{"TPI_LIBELLE":"INSTALLATION","TPI_TYPE":"INSTALLATION"},
                      {"TPI_LIBELLE":"DEINSTALLATION","TPI_TYPE":"INSTALLATION"},
                      {"TPI_LIBELLE":"CHANGEMENT_PILES","TPI_TYPE":"MAINTENANCE"},
                      {"TPI_LIBELLE":"REPARATION_PRODUIT","TPI_TYPE":"MAINTENANCE"},
                      {"TPI_LIBELLE":"CHANGEMENT_PRODUIT","TPI_TYPE":"MAINTENANCE"},
                      {"TPI_LIBELLE":"CREATION_SCENARIO","TPI_TYPE":"SCENARIO"},
                      {"TPI_LIBELLE":"MODIFICATION_SCENARIO","TPI_TYPE":"SCENARIO"},
                      {"TPI_LIBELLE":"TEST_SYSTEME","TPI_TYPE":"SYSTEME"},
                      {"TPI_LIBELLE":"REGLAGE_SYSTEME","TPI_TYPE":"SYSTEME"},
                      {"TPI_LIBELLE":"SURVEILLANCE_INSTALLATION","TPI_TYPE":"SYSTEME"}
                      ]
    for row in typeintervention:
        cursor.execute("""INSERT INTO `T_R_TYPEINTERVENTION_TPI` (`TPI_LIBELLE`,`TPI_TYPE`) VALUES (%(TPI_LIBELLE)s,%(TPI_TYPE)s);""",row)
    print('Les différents type d\interventions sont créées')

    personnes=[{"PRS_NOM":"FREMAUX","PRS_PRENOM":"Kévin","GEN_ID":1,"STT_ID":4},
               {"PRS_NOM":"MAGDALENA","PRS_PRENOM":"Gaetan","GEN_ID":1,"STT_ID":4},
               {"PRS_NOM":"BENEFICIAIRE1","PRS_PRENOM":"Raymond","GEN_ID":1,"STT_ID":1},
               {"PRS_NOM":"BENEFICIAIRE2","PRS_PRENOM":"Pierre","GEN_ID":1,"STT_ID":1},
               {"PRS_NOM":"BENEFICIAIRE3","PRS_PRENOM":"Marcelle","GEN_ID":2,"STT_ID":1},
               {"PRS_NOM":"BENEFICIAIRE4","PRS_PRENOM":"Alice","GEN_ID":2,"STT_ID":1},
               {"PRS_NOM":"BENEFICIAIRE5","PRS_PRENOM":"Pierrette","GEN_ID":2,"STT_ID":1}
               ]
    for row in personnes:
        cursor.execute("""INSERT INTO `T_E_PERSONNEPHYSIQUE_PRS` (`PRS_NOM`,`PRS_PRENOM`,`GEN_ID`,`STT_ID`) VALUES (%(PRS_NOM)s,%(PRS_PRENOM)s,%(GEN_ID)s,%(STT_ID)s);""",row)
    print('Les différentes personnes sont créées')


    ville=[{"CITY_CODEPOSTAL":"37000","CITY_COMMUNE":"TOURS"},
    {"CITY_CODEPOSTAL":"45000","CITY_COMMUNE":"ORLEANS"},
    {"CITY_CODEPOSTAL":"28000","CITY_COMMUNE":"CHARTRES"},
    {"CITY_CODEPOSTAL":"36000","CITY_COMMUNE":"CHATEAUROUX"},
    {"CITY_CODEPOSTAL":"18000","CITY_COMMUNE":"BOURGES"}]

    for row in ville:
        cursor.execute("""INSERT INTO `T_A_VILLE_CITY` (`CITY_CODEPOSTAL`,`CITY_COMMUNE`) VALUES (%(CITY_CODEPOSTAL)s,%(CITY_COMMUNE)s);""",row)
    print('Les différentes ville sont créées')


    adresse=[{"ADR_VOIEPRINCIPALE":"49 boulevard Preuilly","ADR_COMPLEMENTIDENTIFICATION":"","CITY_ID":1,"TAD_ID":3},
    {"ADR_VOIEPRINCIPALE":"49 boulevard Preuilly","ADR_COMPLEMENTIDENTIFICATION":"","CITY_ID":2,"TAD_ID":1},
    {"ADR_VOIEPRINCIPALE":"35 boulevard général de gaulle","ADR_COMPLEMENTIDENTIFICATION":"appt 1","CITY_ID":3,"TAD_ID":1},
    {"ADR_VOIEPRINCIPALE":"12 rue du moulin","ADR_COMPLEMENTIDENTIFICATION":"appt 45 etage 3","CITY_ID":4,"TAD_ID":1},
    {"ADR_VOIEPRINCIPALE":"3 rue du paradis","ADR_COMPLEMENTIDENTIFICATION":"","CITY_ID":5,"TAD_ID":1},
    {"ADR_VOIEPRINCIPALE":"1 rue nationale","ADR_COMPLEMENTIDENTIFICATION":"","CITY_ID":1,"TAD_ID":1},
    {"ADR_VOIEPRINCIPALE":"11 avenue principale","ADR_COMPLEMENTIDENTIFICATION":"","CITY_ID":1,"TAD_ID":1}
                      ]
    for row in adresse:
        cursor.execute("""INSERT INTO `T_E_ADRESSEPOSTALE_ADR` (`ADR_VOIEPRINCIPALE`,`ADR_COMPLEMENTIDENTIFICATION`,`CITY_ID`,`TAD_ID`) VALUES (%(ADR_VOIEPRINCIPALE)s,%(ADR_COMPLEMENTIDENTIFICATION)s,%(CITY_ID)s,%(TAD_ID)s);""",row)
    print('Les différentes adresses sont créées')



    user=[{"AUTH_USERNAME":"admin","AUTH_PASSWORD":"admin","PRS_ID":1}
                      ]
    for row in user:
        cursor.execute("""INSERT INTO `T_R_AUTHENTIFICATION_AUTH` (`AUTH_USERNAME`,`AUTH_PASSWORD`,`PRS_ID`) VALUES (%(AUTH_USERNAME)s,%(AUTH_PASSWORD)s,%(PRS_ID)s);""",row)
    print('Les différents username sont créées')



except mysql.connector.Error as error:
    print("Failed to create table in MySQL: {}".format(error))
finally:
    if (connection.is_connected()):
        connection.commit()

        cursor.close()
        connection.close()
        print("MySQL connection is closed")
