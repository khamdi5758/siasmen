import re
import string
import math
import mysql.connector
import nltk
import string
from nltk.corpus import stopwords
# from nltk.tokenize import sent_tokenize
from textblob import TextBlob
# from nltk.tokenize import RegexpTokenizer

from nltk.tokenize import word_tokenize
from Sastrawi.StopWordRemover.StopWordRemoverFactory import StopWordRemoverFactory
from Sastrawi.Stemmer.StemmerFactory import StemmerFactory
from nltk.corpus import stopwords
from nltk import ngrams

db = mysql.connector.connect(
  host="103.150.116.249",
  port="3306",
  user="userdb",
  password="0-opklm,",
  database="dbsiredosi"
)

class rabinkarp:

    def __init__(self):
        self.data = ''
        self.num = ''
        self.pattern = ''
        self.q = ''
        self.doc1hashh =''
        self.doc2hashh =''
        self.common_hash_list =''
        
    def inputmethod(self,data):
        self.data = data
        self.num = 1
        self.k = 4
        self.q = 100007
#         print(self.num)
    
    def cflower(self):
        self.data = self.data.lower()
        return self.data
    
    def cfrmnum(self):
        self.data = re.sub(r"\d+", "", self.data)
        return self.data
    
    def cfrmpunc(self):
        self.data = self.data.translate(str.maketrans("","",string.punctuation))
        return self.data
    
    def cfrmwhitespace(self):
        self.data = re.sub(r"//t",r"\t", self.data)
        self.data = re.sub(r"( )\1+",r"\1", self.data)
        self.data = re.sub(r"(\n)\1+",r"\1", self.data)
        self.data = re.sub(r"(\r)\1+",r"\1", self.data)
        self.data = re.sub(r"(\t)\1+",r"\1", self.data)
        return self.data.strip(" ")
    
    def tokenize(self):
        self.data = nltk.tokenize.word_tokenize(self.data)
        return self.data
    
    def filteringg(self):
        listStopword =  set(stopwords.words('indonesian'))
        removed = []
        for t in self.data:
            if t not in listStopword:
                removed.append(t)
        return removed
    
    def filtering(self):
        factory = StopWordRemoverFactory()
        stopword_remover = factory.create_stop_word_remover()
        self.data = stopword_remover.remove(self.data)
        return self.data
    
    def stemming(self):
        factory       = StemmerFactory()
        stemmer       = factory.create_stemmer()
        self.data = stemmer.stem(self.data)
        return self.data
    
    def stemmingg(self):
        filteringtext = self.filteringg()
        factory       = StemmerFactory()
        stemmer       = factory.create_stemmer()
        stemmedtext = []
        for stem in filteringtext:
            stemmed_token = stemmer.stem(stem)
            stemmedtext.append(stemmed_token)
        return stemmedtext
    
    def k_gramm(self):
        kgrams = []
        for i in range(len(self.data)-self.k+1):
            kgrams.append(self.data[i:i+self.k])
        return kgrams

    def hashkgrams(self):
        text = self.pattern
        s = 0
        m = len(text) #mencari banyaknya text
        k = m
        b = 10  #bilangan basis
        q = 10007   #modulo

        for i in range(m):
            c = ord(text[i]) #mengubah karakter menjadi ascii
            k = k-1          #banyak karakter
            bk = b**k        #hasil perpangkatan basis dan banyaknya karakter
            t = c*bk         #total dari perkalian antara c dan bk
            tmod = t % q     #menghitung modulo
            s = s+tmod          #total keseluruhan
    #         print(tmod)
        return s
    
    def datahashss(self):
        l = 0
        datahash = []
        for c in range(len(self.k_gramm())):
            jml = 0
            self.pattern = self.k_gramm()[c]
            l = self.hashkgrams()
            jml +=l
            datahash.append((jml))
        return datahash
    
    def nilaihashygsama(self,doc1hash,doc2hash):
        self.doc1hashh = doc1hash
        self.doc2hashh = doc2hash
        doc1_hash_set = set(doc1hash)
        doc2_hash_set = set(doc2hash)
        common_hash_set = doc1_hash_set & doc2_hash_set
        self.common_hash_list = list(common_hash_set)
        return self.common_hash_list
      
    def inhash(self,doc1h,doc2h):
        self.doch1 = doc1h
        self.doch2 = doc2h
        
    def hashterm(self):
        doc_hashterm_list = self.doch1+self.doch2
        doc_hash_set = set(doc_hashterm_list)
#         hashterm_set = doc2_hash_set.union(doc1_hash_set)
        lhashterm = list(doc_hash_set) 
        return doc_hash_set
    
    def cekdplhash(self):
        dochash = self.hashterm()
        doc1h = self.doch1
        doc2h = self.doch2
        datfreqdoc1 = {}
        
        for data in dochash:
            datfreqdoc1[data] = doc1h.count(data)
        return datfreqdoc1
    
    #mencari jumlah duplicate hash
    def dplhash(self):
        dochash = self.hashterm()
        doc1h = self.doch1
        doc2h = self.doch2
        datfreqdoc1 = {}
        
        for data in dochash:
            datfreqdoc1[data] = doc1h.count(data) + doc2h.count(data)
        return datfreqdoc1
    
    #menghitung tfdoc1
    def tfdoc1(self):
        dochashterm = self.hashterm()
        doc1h = self.doch1
        data_tf = {}
        ldttf = []
        for data in dochashterm:
            data_tf[data] = doc1h.count(data) / len(dochashterm)
        ldttf.append(data_tf)
        return ldttf
    
    #menghitung tfdoc2
    def tfdoc2(self):
        dochashterm = self.hashterm()
        doc2h = self.doch2
        data_tf = {}
        ldttf = []
        for data in dochashterm:
            data_tf[data] = doc2h.count(data) / len(dochashterm)
        ldttf.append(data_tf)
        return ldttf
    
    #menghitung idf
    def idf(self):
        dochashterm = self.hashterm()
        dplhashh = self.dplhash()
        data_idf = {}
        for data in dplhashh:
            hitung = math.log(len(dochashterm)/dplhashh[data])
            data_idf[data] = hitung
        return data_idf
    
    #menghitung tfidfdoc1
    def tfidfdoc1(self):
        ldttf = self.tfdoc1()
        data_idf = self.idf()
        hasil = []
        data_sementara = {}
        for index in range(len(ldttf)):
            for i in ldttf[index]:
                hitung = ldttf[index][i]*data_idf[i]
                data_sementara[i] = round(hitung, 3)
            hasil.append(data_sementara)
            data_sementara = {}
        return hasil
    
    #menghitung tfidfdoc2
    def tfidfdoc2(self):
        ldttf = self.tfdoc2()
        data_idf = self.idf()
        hasil = []
        data_sementara = {}
        for index in range(len(ldttf)):
            for i in ldttf[index]:
                hitung = ldttf[index][i]*data_idf[i]
                data_sementara[i] = round(hitung, 3)
            hasil.append(data_sementara)
            data_sementara = {}
        return hasil
    
    def skalardoc12(self):
        dochashterm = self.hashterm()
        tfidfdoc1 = self.tfidfdoc1()
        tfidfdoc2 = self.tfidfdoc2()
        x = 0 
#         print("hashterm    | tfidfdoc1   | tfidfdoc2    |skalar")
        for data in dochashterm:
            xtfidf = tfidfdoc1[0][data] * tfidfdoc2[0][data]
#             print(data ,"|",tfidfdoc1[0][data],"|",tfidfdoc2[0][data],"|",xtfidf)
            x += xtfidf
#         print("skalar = ",x)
        return x
    
    def jmltfidfpang2(self):   
        dochashterm = self.hashterm()
        tfidfdoc1 = self.tfidfdoc1()
        tfidfdoc2 = self.tfidfdoc2()
        jmltfidfp2doc1 = 0
        jmltfidfp2doc2 = 0
#         print("hashterm    | tfidfdoc1^2   | tfidfdoc2^2")
        for data in dochashterm:
            xdoc1p2 = tfidfdoc1[0][data] ** 2
            xdoc2p2 = tfidfdoc2[0][data] ** 2
#             print(data ,"|",xdoc1p2,"|",xdoc2p2)
            jmltfidfp2doc1 += xdoc1p2
            jmltfidfp2doc2 += xdoc2p2

        jmltfidfp2doc1p2 = math.sqrt(jmltfidfp2doc1)
        jmltfidfp2doc2p2 = math.sqrt(jmltfidfp2doc2)
#         print("jmltfidfp2doc1 :",math.sqrt(jmltfidfp2doc1))
#         print("jmltfidfp2doc2 :",jmltfidfp2doc1)
        return round(jmltfidfp2doc1p2,3),round(jmltfidfp2doc2p2,3)
    
    def cosim(self):
        sumskalar = round(self.skalardoc12(),3)
        jmltfidfp2doc1p2,jmltfidfp2doc2p2 = self.jmltfidfpang2()
        costy =  sumskalar / (jmltfidfp2doc1p2 * jmltfidfp2doc2p2)
        return costy
    