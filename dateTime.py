#Import modules needed from datetime
from datetime import time
from datetime import date
from datetime import datetime

#Create a main loop so this module can be imported
def main():

	# Create a new date time object that holds the current datetime
	currentTime = datetime.now()
	
	print(currentTime)
	
	# Print only the time from datetime object
	print(datetime.time(currentTime))
	
	# Use strftime to print only the year from the datetime object
	print("Current Year: ",currentTime.strftime("%Y"))
	
	# Use strftime to print a very human readable date
	print("Current Date: ", currentTime.strftime("%a, %B %d, %Y"))
	
if __name__ == "__main__":
	main()
