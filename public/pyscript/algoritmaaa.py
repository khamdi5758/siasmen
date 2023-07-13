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
    
    def filtering(self):
        factory = StopWordRemoverFactory()
        stopword_remover = factory.create_stop_word_remover()
        self.data = stopword_remover.remove(self.data)
        return self.data
    
    def tokenize(self):
        self.data = nltk.tokenize.word_tokenize(self.data)
        return self.data
    
    def stemming(self):
        factory       = StemmerFactory()
        stemmer       = factory.create_stemmer()
        self.data = stemmer.stem(self.data)
        return self.data
    
#     def stopwords(self):
#         wordlist    = set(stopwords.words('indonesia'))
#         self.data    = [i for i in self.data.split() if i in wordlist]
#         print (self.data)

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
        b = 5  #bilangan basis
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
    
    def similarity(self):
        pemb = math.sqrt(len(self.doc1hashh)) * math.sqrt(len(self.doc2hashh))
        cmhl = len(self.common_hash_list)

        if pemb != 0:
            sim = cmhl / pemb * 100 / 100
            return sim
        else:
            return 0.0