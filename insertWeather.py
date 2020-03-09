#!/usr/bin/python
import time
import MySQLdb

import Adafruit_DHT
#Open database connection
db =  MySQLdb.connect (host="localhost",user="root",passwd="raspberry",db="stem")
#prep a cursor object using cursor() method; cursor is like a navigation method
db.autocommit(True)
cursor = db.cursor(MySQLdb.cursors.DictCursor)
# Sensor should be set to Adafruit_DHT.DHT11,
# Adafruit_DHT.DHT22, or Adafruit_DHT.AM2302.
sensor = Adafruit_DHT.DHT11

pin = 18


# Try to grab a sensor reading.  Use the read_retry method which will retry up
# to 15 times to get a sensor reading (waiting 2 seconds between each retry).
humidity, temperature = Adafruit_DHT.read_retry(sensor, pin)

while humidity !=0 and temperature !=0:
	sql = f"INSERT INTO humidity (temperature, humidity) VALUES ({temperature}, {humidity})"
	cursor.execute(sql) 
	time.sleep(5)

cursor.close()
db.close()

