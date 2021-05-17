CREATE TABLE IF NOT EXISTS history (
  userid VARCHAR(255) NOT NULL,
  city VARCHAR(4) NOT NULL,
  district VARCHAR(6) NOT NULL,
  name VARCHAR(255),
  trade_date int NOT NULL,
  highest_price bigint NOT NULL,
  lowest_price bigint NOT NULL,
  PRIMARY KEY (userid, city, district, trade_date, highest_price, lowest_price)
  );

DELETE FROM sys.dm_exec_cached_plans AS p
CROSS APPLY sys.dm_exec_sql_text(p.plan_handle) AS t
WHERE t.[text] LIKE N 'name';
