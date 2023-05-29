import sys
import json
import os
from vaderSentiment.vaderSentiment import SentimentIntensityAnalyzer
# x1=sys.argv[1]
# x2=sys.argv[2]
# data=json.loads(x)
# print(json.dumps(data))
# print(x1)
# print(x2)
data = {
    'nama': 'John Doe',
    'umur': 30,
    'email': 'johndoe@example.com'
}
# Mendapatkan path absolut dari direktori saat ini
current_directory = os.path.dirname(os.path.abspath(__file__))

# Menggabungkan path absolut dengan nama file data.json
json_file_path = os.path.join(current_directory, 'data.json')
# with open(json_file_path, 'w') as json_file:
#     json.dump(data, json_file)

with open(json_file_path, 'r') as json_file:
    data = json.load(json_file)
    
print(data)