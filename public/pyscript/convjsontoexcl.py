import pandas as pd
import os
import json
from algoritma import db

# Data JSON yang diberikan
dataa = []
current_directory = os.path.dirname(os.path.abspath(__file__))
json_file_path = os.path.join(current_directory, 'hasil.json')

with open(json_file_path, 'r',encoding='utf-8') as file:
    json_data = json.load(file)


nama_list = [item['nama'] for item in json_data]

# Membuat DataFrame dari data JSON
# df = pd.DataFrame(json_data)
df = pd.DataFrame(nama_list, columns=['nama'])
excl_file_path = os.path.join(current_directory, 'output.xlsx')
# Menyimpan DataFrame ke file Excel
df.to_excel(excl_file_path, index=False)


