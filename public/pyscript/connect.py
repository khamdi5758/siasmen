import mysql.connector
import json

db = mysql.connector.connect(
  host="localhost",
  port = "3306",
  user="root",
  passwd="",
  database = "db_siasmen"
)

# if db.is_connected():
#   print("Berhasil terhubung ke database")
cursor = db.cursor()
sql = "SELECT `id`, `nim`, `nama`, `jenkel`, `perguruan_tinggi`, `program_studi`, `jenjang`, `status`, `foto` FROM `mahasiswas` "
cursor.execute(sql)
results = cursor.fetchall()
data = json.dumps(results)
print(data)


