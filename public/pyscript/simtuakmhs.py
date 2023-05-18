# from dathash import hashpnltdos
import dathash as dh
from algoritma import rabinkarp
import sys
import json


def pengajuan():
    dattuakmhsfrmdb = dh.htuakmhs
    arrayString = sys.argv[1].split(";")
    judulfrmuser = rabinkarp()
    judulfrmuser.inputmethod(arrayString[1])
    judulfrmuser.preprocessingdata()
    dathjudulfrmuser = judulfrmuser.datahashs()

    deskjudfrmuser = rabinkarp()
    deskjudfrmuser.inputmethod(arrayString[2])
    deskjudfrmuser.preprocessingdata()
    dathdeskjudfrmuser = deskjudfrmuser.datahashs()
    
    allsimfrmtuakmhs = []
    for a in range(len(dattuakmhsfrmdb)):
        for b in range(len(dattuakmhsfrmdb[a])):
            if b == 0 :
                idtuak = dattuakmhsfrmdb[a][b]
            if b == 1 :
                mhsid = dattuakmhsfrmdb[a][b]
            if b == 2 :
                dosenid = dattuakmhsfrmdb[a][b]
            if b == 3 :
                hashjud = dattuakmhsfrmdb[a][b]
                kondisi1 = rabinkarp()
                kondisi1.nilaihashygsama(hashjud,dathjudulfrmuser)
                hsokond1 = kondisi1.similarity()
            if b == 4 :
                hashstrak = dattuakmhsfrmdb[a][b]
                kondisi2 = rabinkarp()
                kondisi2.nilaihashygsama(hashstrak,dathdeskjudfrmuser)
                hsokond2 = kondisi2.similarity()
            if b == 5 :
                tahun = dattuakmhsfrmdb[a][b]
        allsimfrmtuakmhs.append([idtuak,mhsid,dosenid,hashjud,hashstrak,tahun,hsokond1,hsokond2])  

    rankfrmtuakmhs = allsimfrmtuakmhs
    # Mengurutkan array dari terbesar ke terkecil berdasarkan indeks ke-6(simhashabstrak)
    rankfrmtuakmhs.sort(key=lambda x: x[7], reverse=True)

    #mengambil id dosen 
    dosid = []
    for b in range(len(rankfrmtuakmhs)):
        for c in range(len(rankfrmtuakmhs[b])):
            if c == 2 :
                dosid.append(rankfrmtuakmhs[b][c])

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