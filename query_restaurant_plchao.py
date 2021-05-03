#!/usr/bin/env python
# coding: utf-8

# In[1]:


import urllib.request, json 

key = ""


def query_json(lon, lan):
    page = "1"
    with urllib.request.urlopen("https://maps.googleapis.com/maps/api/place/nearbysearch/json?location="+str(lan)+","+str(lon)+"&radius=10000&type=restaurant&keyword=%E9%A4%90%E5%BB%B3&key="+key) as url:
        data = json.loads(url.read())
        if data['status']=='REQUEST_DENIED':
            print(data)
            print("error_at_",str(lon), str(lan))
        with open("./data/rest_" + str(lan) + "_" + str(lon) + "_" + page + ".json", 'w') as f:
            json.dump(data, f)
        if 'next_page_token' not in data:
            return
        else:
            next_page = data['next_page_token']
    page = "2"
    with urllib.request.urlopen("https://maps.googleapis.com/maps/api/place/nearbysearch/json?location="+str(lan)+","+str(lon)+"&radius=10000&type=restaurant&keyword=%E9%A4%90%E5%BB%B3&key="+key        +"&pagetoken="+next_page) as url:
        data = json.loads(url.read())
        if data['status']=='REQUEST_DENIED':
            print(data)
            print("error_at_",str(lon), str(lan))
        with open("./data/rest_" + str(lan) + "_" + str(lon) + "_" + page + ".json", 'w') as f:
            json.dump(data, f)
        if 'next_page_token' not in data:
            return
        else:
            next_page = data['next_page_token']
    page = "3"
    with urllib.request.urlopen("https://maps.googleapis.com/maps/api/place/nearbysearch/json?location="+str(lan)+","+str(lon)+"&radius=10000&type=restaurant&keyword=%E9%A4%90%E5%BB%B3&key="+key        +"&pagetoken="+next_page) as url:
        data = json.loads(url.read())
        if data['status']=='REQUEST_DENIED':
            print(data)
            print("error_at_",str(lon), str(lan))
        with open("./data/rest_" + str(lan) + "_" + str(lon) + "_" + page + ".json", 'w') as f:
            json.dump(data, f)
        if 'next_page_token' not in data:
            return
        else:
            next_page = data['next_page_token']


# In[8]:


startlon = 120.958570
startlan = 24.824523

stoplon = 121.023437
stoplan = 24.772472

step = 0.02

print("expected query num:", int((startlan - stoplan)/step)*int((stoplon - startlon)/step))


# In[10]:


lon = startlon
lan = startlan
while(not(abs(stoplan - lan) < step and abs(stoplon - lon) < step)):
    print(lan, lon)
    query_json(lon, lan)
    if stoplon - lon < step:
        lon = startlon
        lan -= step
    else:
        lon += step



