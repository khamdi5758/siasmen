# from dathash import hashpnltdos
# import dathash as dh
from dathash import db
from algoritma import rabinkarp
import sys
import json
import os


def pengajuan():
    current_directory = os.path.dirname(os.path.abspath(__file__))
    json_file_path = os.path.join(current_directory, 'data.json')
    with open(json_file_path, 'r') as json_file:
        datmrgpnltwtuakk = json.load(json_file)
    # datmrgpnltwtuakk = dh.hmrgpnltwtuakk
    arrayString = sys.argv[1].split(";")
    mrgjuddesk = arrayString[1]+" "+arrayString[2]
    # mrgjuddesk = "Klasifikasi Bidang Praktek Kerja Industri Menggunakan Algoritma K-Nearest Neighbor di SMK Negeri 2 Sampang","Praktek kerja industri (PRAKERIN) merupakan salah satu program wajib yang harus dijalani bagi peserta didik yang menempuh pendidikan di Sekolah Menengah Kejuruan (SMK). Di jurusan Multimedia pelaksanaan prakerin dibagi menjadi 4 bidang yaitu bidang perkantoran, percetakan, perfilman dan perakitan. Penentuan bidang prakerin untuk menentukan tempat industri bagi masing-masing peserta didik di SMK Negeri 2 Sampang berdasarkan pada keminatan siswa dan pengamatan dalam setiap pembelajaran terutama mata pelajaran produktif, selain itu belum ada sistem untuk mengelompokkan bidang prakerin untuk maisng-masing peserta didik."
    juddeskfromuser = rabinkarp()
    juddeskfromuser.inputmethod(mrgjuddesk)
    juddeskfromuser.preprocessingdata()
    dathjuddeskfromuser = juddeskfromuser.datahashs()
    # judulfrmuser = rabinkarp()
    # judulfrmuser.inputmethod(arrayString[1])
    # judulfrmuser.preprocessingdata()
    # dathjudulfrmuser = judulfrmuser.datahashs()

    # deskjudfrmuser = rabinkarp()
    # deskjudfrmuser.inputmethod(arrayString[2])
    # deskjudfrmuser.preprocessingdata()
    # dathdeskjudfrmuser = deskjudfrmuser.datahashs()
    
    allsim = []
    for a in range(len(datmrgpnltwtuakk)):
        for b in range(len(datmrgpnltwtuakk[a])):
            if b == 0 :
                dosenid = datmrgpnltwtuakk[a][b]
            if b == 1 :
                hashjudtrak = datmrgpnltwtuakk[a][b]
                kondisi1 = rabinkarp()
                kondisi1.nilaihashygsama(hashjudtrak,dathjuddeskfromuser)
                hsokond1 = kondisi1.similarity()
                allsim.append([dosenid, hashjudtrak, hsokond1])
    ranksim = allsim
    # Mengurutkan array dari terbesar ke terkecil berdasarkan indeks ke-6(simhashabstrak)
    ranksim.sort(key=lambda x: x[2], reverse=True)

    #mengambil id dosen 
    dosid = []
    for b in range(len(ranksim)):
        for c in range(len(ranksim[b])):
            if c == 0 :
                dosid.append(ranksim[b][c])

    # untuk menghapus id dosen yang memiliki duplicate
    unique_arr = []
    for i in dosid:
        if i not in unique_arr:
            unique_arr.append(i)

    datredos = []
    for a in range(len(unique_arr)):
        datdos = []
        idredos = unique_arr[a]
        # db = dh.db
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
    #data = json.dumps(ranksim)
    return data
    # return dh.hpnltdos
    # print(result[0])
    
# pengajuan()
print(pengajuan())