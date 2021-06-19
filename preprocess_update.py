import pandas as pd
import os
import re
import json


def parse_data(filename):
    data = []
    with open(filename) as f:
        data = json.load(f)['results']
    output = []
    for i in range(len(data)):
        output.append([data[i]["name"], data[i]["geometry"]["location"]["lat"], \
            data[i]["geometry"]["location"]["lng"], data[i]["rating"], data[i]["user_ratings_total"], \
                    data[i]["vicinity"]])
    result = pd.DataFrame(output, columns=['name', 'lat', 'lng', 'rating', 'user_ratings_total', 'address'])
    # print(result.loc[1])
    return result

files = os.listdir("./data")
merge_df = pd.DataFrame()
for foldername in files:
    filename = "./data"+"/"+foldername
    if re.match(".*json", filename):
        df = parse_data(filename)
        merge_df = merge_df.append(df, ignore_index=True)

merge_df = merge_df.drop_duplicates()
merge_df['id'] = ""
merge_df['datasorce'] = ""
df = df.reindex(columns=['id','name', 'lat', 'lng', 'rating', 'user_ratings_total', 'address','datasorce'])
print(merge_df.shape)
merge_df.to_csv("./db.csv", index=False)


