# from dathash import hashpnltdos
import dathash as dh
from algoritma import rabinkarp
import sys
import json
import subprocess


def pengajuan():
    datpnltdosfrmdb = dh.hpnltdos
    arrayString = sys.argv[1].split(";")
    judulfrmuser = rabinkarp()
    judulfrmuser.inputmethod(arrayString[1])
    judulfrmuser.preprocessingdata()
    dathjudulfrmuser = judulfrmuser.datahashs()

    deskjudfrmuser = rabinkarp()
    deskjudfrmuser.inputmethod(arrayString[2])
    deskjudfrmuser.preprocessingdata()
    dathdeskjudfrmuser = deskjudfrmuser.datahashs()
    
    allsimfrmpnltdos = []
    for a in range(len(datpnltdosfrmdb)):
        for b in range(len(datpnltdosfrmdb[a])):
            if b == 0 :
                idpnlt = datpnltdosfrmdb[a][b]
            if b == 1 :
                iddos = datpnltdosfrmdb[a][b]
            if b == 2 :
                hashjud = datpnltdosfrmdb[a][b]
                kondisi1 = rabinkarp()
                kondisi1.nilaihashygsama(hashjud,dathjudulfrmuser)
                hsokond1 = kondisi1.similarity()
            if b == 3 :
                hashstrak = datpnltdosfrmdb[a][b]
                kondisi2 = rabinkarp()
                kondisi2.nilaihashygsama(hashstrak,dathdeskjudfrmuser)
                hsokond2 = kondisi2.similarity()
            if b == 4 :
                tahun = datpnltdosfrmdb[a][b]
                
        allsimfrmpnltdos.append([idpnlt,iddos,hashjud,hashstrak,tahun,hsokond1,hsokond2])  

    rankfrmpnltdos = allsimfrmpnltdos
    # Mengurutkan array dari terbesar ke terkecil berdasarkan indeks ke-6(simhashabstrak)
    rankfrmpnltdos.sort(key=lambda x: x[6], reverse=True)

    #mengambil id dosen 
    dosid = []
    for b in range(len(rankfrmpnltdos)):
        for c in range(len(rankfrmpnltdos[b])):
            if c == 1 :
                dosid.append(rankfrmpnltdos[b][c])

    # untuk menghapus id dosen yang memiliki duplicate
    unique_arr = []
    for i in dosid:
        if i not in unique_arr:
            unique_arr.append(i)

    datredos = []
    for a in range(len(unique_arr)):
        datdos = []
        idredos = unique_arr[a]
        db = dh.db
        cursor = db.cursor()
        sql = "SELECT * FROM dosens WHERE id = %s"
        param = (idredos, )
        cursor.execute(sql,param)
        results = cursor.fetchall()
        for row in results:
            datdos.append({
            "id": row[0],
            "nip": row[1],
            "nama": row[2],
            "foto": row[7]
            })
        datredos.append(datdos)

    data = json.dumps(datredos)
    return data
    # return dh.hpnltdos
    # print(result[0])
    
# pengajuan()
print(pengajuan())