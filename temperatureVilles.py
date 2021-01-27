# coding: UTF-8
"""
Script: temperatureVilles/temperatureVilles
Création: hvazdearau, le 15/01/2021
"""


# Imports
import requests
import mysql.connector

# Fonctions


def get_temperature(ville):
    url = "http://api.openweathermap.org/data/2.5/weather?q="+ville+",fr&units=metrics&lang=fr&appid" \
                                                                    "=0a73790ec47f53b9e1f2e33088a0f7d0"
    return float(requests.get(url).json()['main']['temp'])
    return float(requests.get(url).json()['main']['pressure'])


def set_temperature_bdd(temperature, ville):
    cnx = mysql.connector.connect(user='root', password='', host='127.0.0.1', database='bdd_temperaturevilles')
    cursor = cnx.cursor()
    update_temperature = ("UPDATE temperaturevilles SET temperature=%s WHERE ville=%s")
    data = (temperature, ville)
    cursor.execute(update_temperature, data)
    cnx.commit()
    cursor.close()
    cnx.close()


# Programme principal


def main():
    villes = ["grenoble", "porto", "paris", "meylan"]
    for i in villes:
        set_temperature_bdd(get_temperature(i), i)


if __name__ == '__main__':
    main()
# fin
