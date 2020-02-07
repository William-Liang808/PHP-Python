import pymysql
import RPi.GPIO as GPIO
import time

# Set pin numbering mode
GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

# Set pin 21 to output mode
GPIO.setup(21,GPIO.OUT)

# Loops the opening and closing of database 
while True:
	# Open database connection
	db = pymysql.connect("localhost","root","password","button")

	# Prepare a cursor object using cursor() method
	cur = db.cursor(pymysql.cursors.DictCursor)
	
	sql = "SELECT power FROM switch WHERE id =2";
	
	# Execute SQL query using execute() method.
	cur.execute(sql)
	
	# Fetch all rows from the database table using cursor's fetchall()
	rows = cur.fetchall()
	for row in rows:
		print(row['power'])
		# Checks if value of power is 1 to turn light on.
		if (row['power'] == 1):
			print("LED on")
			GPIO.output(21,GPIO.HIGH)
		else:
			print("LED off")
			GPIO.output(21,GPIO.LOW)
		time.sleep(1)
			
	# Disconnect from server
	cur.close()
	db.close()
