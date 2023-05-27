import mysql.connector
import sys
import json
import re
import math
import base64

db = mysql.connector.connect(
  host="103.150.116.249",
  port="3306",
  user="root",
  password="0-opklm,",
  database="db_siredosi"
)

# input_data = json.loads(base64.b64decode(sys.argv[1]))
input_data = "coba"
# data = json.dumps(input_data)

def selectmrgpnltwtuak():
    cursor = db.cursor()
    sql = "SELECT dosens_id, judul, abstrak FROM pnltdosens UNION SELECT dosens_id,judul,abstrak FROM tamhs"
    cursor.execute(sql)
    #results = "coba"
    results = cursor.fetchall()
    data = json.dumps(results)
    return results

# def select(paramnim):
#   cursor = db.cursor()
#   sql = "SELECT `id`, `nim`, `nama`, `jenkel`, `perguruan_tinggi`, `program_studi`, `jenjang`, `status`, `foto` FROM `mahasiswas` WHERE nim = %s"
#   nim = (paramnim,)
#   cursor.execute(sql,nim)
#   results = cursor.fetchall()

#   # membentuk data kedalam array associative
#   my_array = []
#   for row in results:
#       my_array.append({
#           "id": row[0],
#           "nim": row[1],
#           "nama": row[2],
#           "jenkel": row[3],
#           "perguruan_tinggi": row[4],
#           "program_studi": row[5],
#           "jenjang": row[6],
#           "status": row[7],
#           "foto": row[8]
#       })
#   # membentuk data kedalam bentuk json
#   data = json.dumps(my_array)
#   # print(my_array[0]['nama'])
#   return data;

# def selectt():
#   cursor = db.cursor()
#   sql = "SELECT `id`, `nim`, `nama`, `jenkel`, `perguruan_tinggi`, `program_studi`, `jenjang`, `status`, `foto` FROM `mahasiswas` "
#   cursor.execute(sql)
#   results = cursor.fetchall()
#   # membentuk data kedalam array associative
#   my_array = []
#   for row in results:
#       my_array.append({
#           "id": row[0],
#           "nim": row[1],
#           "nama": row[2],
#           "jenkel": row[3],
#           "perguruan_tinggi": row[4],
#           "program_studi": row[5],
#           "jenjang": row[6],
#           "status": row[7],
#           "foto": row[8]
#       })
#   data = json.dumps(my_array)
#   return data

# def pengajuan():
#   arrayString = sys.argv[1].split(",")
#   final = []
#   for i in range(len(arrayString)):
#       final.append(arrayString[i].split("-"))
#   data = json.dumps(final[2])
#   return data

# def param():
#   arrayString = sys.argv[1].split(",")
#   print(select(arrayString[0]))

# def selectdos():
#   cursor = db.cursor()
#   sql = "SELECT `id`, `nip`, `nama`, `jenkel`, `status`, `pendidikan_terakhir`, `pangkat`, `foto` FROM `dosens`"
#   cursor.execute(sql)
#   results = cursor.fetchall()
#   # membentuk data kedalam array associative
#   my_array = []
#   for row in results:
#       my_array.append({
#           "id": row[0],
#           "nip": row[1],
#           "nama": row[2],
#           "jenkel": row[3],
#           "status": row[4],
#           "pendidikan_terakhir": row[5],
#           "pangkat": row[6],
#           "foto": row[7]
#       })
#   data = json.dumps(my_array)
#   return data

# def selectpnltdos():
#   cursor = db.cursor()
#   sql = "SELECT `id`, `dosens_id`, `judul`, `abstrak`, `tahun` FROM `pnltdosens`;"
#   cursor.execute(sql)
#   results = cursor.fetchall()

#   return results


# def preprocessingdata():

#   preprocessed_data = []
#   for row in selectpnltdos():
#       id = row[0]
#       dosens_id = row[1]
#       judul = row[2].lower()
#       abstrak = row[3].lower()

#       # Hapus karakter-karakter yang tidak diperlukan
#       judul = re.sub(r'[^\w\s]', '', judul)
#       abstrak = re.sub(r'[^\w\s]', '', abstrak)

#       preprocessed_data.append((id,dosens_id, judul, abstrak))
#   return preprocessed_data

# # Implementasi algoritma Rabin-Karp
# def rabin_karp(text, pattern):
#     pattern_hash = hash(pattern)
#     n = len(text)
#     m = len(pattern)

#     for i in range(n - m + 1):
#         if hash(text[i:i + m]) == pattern_hash:
#             if text[i:i + m] == pattern:
#                 return True
#     return False

# # Implementasi algoritma Cosine Similarity
# def cosine_similarity(vector1, vector2):
#     dot_product = sum(p * q for p, q in zip(vector1, vector2))
#     magnitude1 = math.sqrt(sum([val ** 2 for val in vector1]))
#     magnitude2 = math.sqrt(sum([val ** 2 for val in vector2]))

#     if not magnitude1 or not magnitude2:
#         return 0
#     else:
#         return dot_product / (magnitude1 * magnitude2)
    
# # Fungsi untuk melakukan rekomendasi
# def recommend(input_text, threshold=0.5):
#     # Lakukan preprocessing pada input pengguna
#     input_text = input_text.lower()
#     input_text = re.sub(r'[^\w\s]', '', input_text)

#     # Hitung cosine similarity antara input pengguna dengan data yang ada
#     scores = []
#     for row in preprocessingdata():
#         id = row[0]
#         judul = row[1]
#         konten = row[2]

#         text = judul + " " + konten
#         if text:
#            score = cosine_similarity(input_text, text)
#         if score >= threshold:
#            scores.append((id, score))

#     # Urutkan produk berdasarkan skor kemiripannya dengan input pengguna
#     scores.sort(reverse=True, key=lambda x: x[1])

#     # Ambil ID produk dari daftar skor
#     recommended_products = [score[0] for score in scores]

#     return recommended_products


# print(select("190631100106"))
# print("##################")
# print(selectpnltdos())
# print("##################")
# print(preprocessingdata())
# print(selectdos())
# print(pengajuan())
print(selectmrgpnltwtuak())
    


    









