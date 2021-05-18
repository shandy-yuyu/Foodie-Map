CREATE TABLE IF NOT EXISTS history (
  name VARCHAR(255),
  rate int NOT NULL,
  PRIMARY KEY (name, rate)
  );

DELETE FROM sys.dm_exec_cached_plans AS p
CROSS APPLY sys.dm_exec_sql_text(p.plan_handle) AS t
WHERE t.[text] LIKE N 'name';
