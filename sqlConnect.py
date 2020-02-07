import MySQLdb
#Open database connection
db =  MySQLdb.connect (host="localhost",user="user",passwd="password",db="school")
#prep a cursor object using cursor() method; cursor is like a navigation method
db.autocommit(True)
cursor = db.cursor(MySQLdb.cursors.DictCursor)

sql ="SELECT * FROM students"
cursor.execute(sql)
myresult = cursor.fetchall()
#sql statement that is excuted and selects everything from students, then fetches the data
for x in myresult:
  print(x)
#for loop that prints out the fetched data
cursor.close()
db.close()
