CREATE USER sys_videoclub@localhost IDENTIFIED BY 'v1d30c!ub$';
GRANT DELETE ON videoclub.* TO sys_videoclub@localhost;
GRANT SELECT ON videoclub.* TO sys_videoclub@localhost;
GRANT INSERT ON videoclub.* TO sys_videoclub@localhost;
GRANT UPDATE ON videoclub.* TO sys_videoclub@localhost;
FLUSH PRIVILEGES;




