# !pip install textblob 
# !pip install nltk
import re
import string
import math
from nltk.tokenize import word_tokenize
from nltk.corpus import stopwords
from textblob import TextBlob


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
#         print(self.num)

    def clean(self):
        #casefolding
        #lower text
        self.data = self.data.lower()
        #menghapus html tag
        self.data = re.sub('<[^>]*>','',self.data)
        #menghapus email
        self.data = re.sub('\S*@\S*\s?','',self.data)
        #menghapus url
        self.data = re.sub('https?://[A-Za-z0-9]','',self.data)
        #removing number
        self.data = re.sub('[^a-zA-Z]',' ',self.data)
        #menghapus angka
#         self.data = re.sub(r"\d+", "", self.data)
        #menghapus tanda baca
        self.data = self.data.translate(str.maketrans("","",string.punctuation))
        #menghapus karakter kosong
        self.data = self.data.strip()
        

        #tokenization
        word_tokens = word_tokenize(self.data)

        #stopword
        filtered_sentence=[]
        for word_token in word_tokens:
            if word_token not in stopwords:
                filtered_sentence.append(word_token)

        #join words
        self.data = (' '. join(filtered_sentence))
        return self.data
    
    def preprocessingdata(self):
        self.data = str(self.data)
        self.data = self.data.lower()
        self.data = re.sub(r'[^\w\s]', '', self.data)
        return self.data

    def n_gram(self):
        n_grams = TextBlob(self.data).ngrams(self.num)
        return [ ' '.join(grams) for grams in n_grams]

    def k_gram(self):
        # Pisahkan kalimat menjadi k-gram
        self.datafkgram = self.n_gram()
#         self.datafkgram = self.data
        kgrams = []
        for i in range(len(self.datafkgram)-self.k+1):
            kgrams.append(self.datafkgram[i:i+self.k])
        return kgrams
    
    def khash(self):
        s = 0
        m = len(self.pattern)

        for i in range(m):
            m = m-1
            r = 11**m
            t = ord(self.pattern[i])*r
            s = s+t
        else:
            h = s % self.q
            return h
    
    def datahashs(self):
        l = 0
        datahash = []
        for c in range(len(self.k_gram())):
            jml = 0
            for d in range(len(self.k_gram()[c])):
                self.pattern = self.k_gram()[c][d]
                self.q = 100007
                l = self.khash()
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
        