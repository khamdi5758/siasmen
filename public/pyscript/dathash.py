import mysql.connector
from algoritma import rabinkarp
import sys
import json

db = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="db_siasmen"
)

def selectpnltdos():
    cursor = db.cursor()
    sql = "SELECT `id`, `dosens_id`, `judul`, `abstrak`, `tahun` FROM `pnltdosens`;"
    cursor.execute(sql)
    results = cursor.fetchall()
    return results

def hashpnltdos():
    penelitiandos = selectpnltdos()
    datpnltdosfrmdb = []
    for a in range(len(penelitiandos)):
        judul = rabinkarp()
        abstrak = rabinkarp()
        for b in range(len(penelitiandos[a])):
            if b == 0 :
                idpnlt = penelitiandos[a][b]
            if b == 1 :
                dosenid = penelitiandos[a][b]
            if b == 2 :
                judul.inputmethod(penelitiandos[a][b])
                judul.preprocessingdata()
                datjud = judul.datahashs()
            if b == 3 :
                abstrak.inputmethod(penelitiandos[a][b])
                abstrak.preprocessingdata()
                datstrak = abstrak.datahashs()
            if b == 4 :
                tahun = penelitiandos[a][b]
        datpnltdosfrmdb.append([idpnlt,dosenid,datjud,datstrak,tahun])
    # jsondatpnltdosfrmdb = json.dumps(datpnltdosfrmdb)
    # print(jsondatpnltdosfrmdb)
    # return jsondatpnltdosfrmdb
    return datpnltdosfrmdb


def selecttamhs():
    cursor = db.cursor()
    sql = "SELECT `id`, `mahasiswas_id`, `dosens_id`, `judul`, `abstrak`, `tahun` FROM `tamhs`"
    cursor.execute(sql)
    results = cursor.fetchall()
    return results

def hashtuakmhs():
    tuakmhs = selecttamhs()
    dattuakmhsfrmdb = []
    for a in range(len(tuakmhs)):
        judul = rabinkarp()
        abstrak = rabinkarp()
        for b in range(len(tuakmhs[a])):
            if b == 0 :
                idtuak = tuakmhs[a][b]
            if b == 1 :
                mhsid = tuakmhs[a][b]
            if b == 2 :
                dosenid = tuakmhs[a][b]
            if b == 3 :
                judul.inputmethod(tuakmhs[a][b])
                judul.preprocessingdata()
                datjud = judul.datahashs()
            if b == 4 :
                abstrak.inputmethod(tuakmhs[a][b])
                abstrak.preprocessingdata()
                datstrak = abstrak.datahashs()
            if b == 5 :
                tahun = tuakmhs[a][b]
        dattuakmhsfrmdb.append([idtuak,mhsid,dosenid,datjud,datstrak,tahun]) 
    return dattuakmhsfrmdb


def selectmrgpnltwtuak():
    cursor = db.cursor()
    sql = "SELECT dosens_id, judul, abstrak FROM pnltdosens UNION SELECT dosens_id,judul,abstrak FROM tamhs"
    cursor.execute(sql)
    results = cursor.fetchall()
    return results

def hashmrgpnltwtuak():
    mrgpnltwtuak = selectmrgpnltwtuak()
    datmrgpnltwtuak = []
    for a in range(len(mrgpnltwtuak)):
        judul = rabinkarp()
        abstrak = rabinkarp()
        for b in range(len(mrgpnltwtuak[a])):
            if b == 0 :
                dosenid = mrgpnltwtuak[a][b]
            if b == 1 :
                # judul = mrgpnltwtuak[a][b]
                judul.inputmethod(mrgpnltwtuak[a][b])
                judul.preprocessingdata()
                datjud = judul.datahashs()
            if b == 2 :
                abstrak.inputmethod(mrgpnltwtuak[a][b])
                abstrak.preprocessingdata()
                datstrak = abstrak.datahashs()
        datmrgpnltwtuak.append([dosenid,datjud,datstrak]) 
    return datmrgpnltwtuak

def hashmrgpnltwtuakk():
    mrgpnltwtuak = selectmrgpnltwtuak()
    datmrgpnlttuak = []
    for a in range(len(mrgpnltwtuak)):
        judtrak = rabinkarp()
        for b in range(len(mrgpnltwtuak[a])):
            if b == 0 :
                dosenid = mrgpnltwtuak[a][b]
            if b == 1 :
                judull = mrgpnltwtuak[a][b]
            if b == 2 :
                abstrakk = mrgpnltwtuak[a][b]
        mrgjudtrak = judull+" "+abstrakk
        judtrak.inputmethod(mrgjudtrak)
        judtrak.preprocessingdata()
        datjudtrak = judtrak.datahashs()
        datmrgpnlttuak.append([dosenid,datjudtrak])
    return datmrgpnlttuak


# hashpnltdos()
hpnltdos = hashpnltdos()
htuakmhs = hashtuakmhs()
hmrgpnltwtuak = hashmrgpnltwtuak()
hmrgpnltwtuakk = hashmrgpnltwtuakk()
# with open('hpnltdos.json', 'w') as f:
#     f.write(hpnltdos)
    
# print(hashpnltdos())

# def coba():
#     arrayString = sys.argv[1].split(";")
#     datpnltdosfrmdb = hashpnltdos()
#     print(datpnltdosfrmdb[0])

# def pengajuan():
#     arrayString = sys.argv[1].split(";")
    # datpnltdosfrmdb = hashpnltdos()
    # # penelitiandos = selectpnltdos()
    # # datpnltdosfrmdb = []
    # # for a in range(len(penelitiandos)):
    # #     judul = rabinkarp()
    # #     abstrak = rabinkarp()
    # #     for b in range(len(penelitiandos[a])):
    # #         if b == 0 :
    # #             idpnlt = penelitiandos[a][b]
    # #         if b == 1 :
    # #             dosenid = penelitiandos[a][b]
    # #         if b == 2 :
    # #             judul.inputmethod(penelitiandos[a][b])
    # #             judul.preprocessingdata()
    # #             datjud = judul.datahashs()
    # #         if b == 3 :
    # #             abstrak.inputmethod(penelitiandos[a][b])
    # #             abstrak.preprocessingdata()
    # #             datstrak = abstrak.datahashs()
    # #         if b == 4 :
    # #             tahun = penelitiandos[a][b]
    # #     datpnltdosfrmdb.append([idpnlt,dosenid,datjud,datstrak,tahun])  

    # judulfrmuser = rabinkarp()
    # judulfrmuser.inputmethod(arrayString[1])
    # judulfrmuser.preprocessingdata()
    # dathjudulfrmuser = judulfrmuser.datahashs()

    # deskjudfrmuser = rabinkarp()
    # deskjudfrmuser.inputmethod(arrayString[2])
    # deskjudfrmuser.preprocessingdata()
    # dathdeskjudfrmuser = deskjudfrmuser.datahashs()
    
    # allsimfrmpnltdos = []
    # for a in range(len(datpnltdosfrmdb)):
    #     for b in range(len(datpnltdosfrmdb[a])):
    #         if b == 0 :
    #             idpnlt = datpnltdosfrmdb[a][b]
    #         if b == 1 :
    #             iddos = datpnltdosfrmdb[a][b]
    #         if b == 2 :
    #             hashjud = datpnltdosfrmdb[a][b]
    #             kondisi1 = rabinkarp()
    #             kondisi1.nilaihashygsama(hashjud,dathjudulfrmuser)
    #             hsokond1 = kondisi1.similarity()
    #         if b == 3 :
    #             hashstrak = datpnltdosfrmdb[a][b]
    #             kondisi2 = rabinkarp()
    #             kondisi2.nilaihashygsama(hashstrak,dathdeskjudfrmuser)
    #             hsokond2 = kondisi2.similarity()
    #         if b == 4 :
    #             tahun = datpnltdosfrmdb[a][b]
                
    #     allsimfrmpnltdos.append([idpnlt,iddos,hashjud,hashstrak,tahun,hsokond1,hsokond2])  

    # rankfrmpnltdos = allsimfrmpnltdos
    # # Mengurutkan array dari terbesar ke terkecil berdasarkan indeks ke-6(simhashabstrak)
    # rankfrmpnltdos.sort(key=lambda x: x[6], reverse=True)

    # #mengambil id dosen 
    # dosid = []
    # for b in range(len(rankfrmpnltdos)):
    #     for c in range(len(rankfrmpnltdos[b])):
    #         if c == 1 :
    #             dosid.append(rankfrmpnltdos[b][c])

    # # untuk menghapus id dosen yang memiliki duplicate
    # unique_arr = []
    # for i in dosid:
    #     if i not in unique_arr:
            # unique_arr.append(i)

    # datredos = []
    # for a in range(len(unique_arr)):
    #     datdos = []
    #     idredos = unique_arr[a]
    #     cursor = db.cursor()
    #     sql = "SELECT * FROM dosens WHERE id = %s"
    #     param = (idredos, )
    #     cursor.execute(sql,param)
    #     results = cursor.fetchall()
    #     for row in results:
    #         datdos.append({
    #         "id": row[0],
    #         "nip": row[1],
    #         "nama": row[2],
    #         "foto": row[7]
    #         })
    #     datredos.append(datdos)


    # data = json.dumps(arrayString)
    # return data

# coba()

# print(hashpnltdos())



