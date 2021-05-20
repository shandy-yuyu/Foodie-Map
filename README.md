# Foodie-Map
## 命名方式
1. 屬於你的檔案就後面後綴你想要的字串 (ex. init_plchao.sql, login_plchao.sql)
2. 不要更動到其他人的檔案
## query_restaurant_plchao.py 使用方式
1. 填入 key
2. 改動開始與結束的經緯度，step 表示一次移動會移動幾次
3. 開始跑，json 會存入 data 的資料夾
## init.sql 使用方式
> 用以初始化資料庫
1. 跑 line 1-4 (建立 term_project 的資料庫)
2. 在 term_project 下跑 line 5-21 (建立 userlis, restaurant 資料表)
3. 切至 restaurant 資料表，點匯入，匯入 db.csv (在共用雲端)，如下圖
![](https://i.imgur.com/bsV5wqT.png)
4. 跑 line 23 (移除 csv 多出來的欄位名稱)# test
