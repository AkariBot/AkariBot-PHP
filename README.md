**公開用に編集中です。**

# AkariBot-PHP
AkariBotでは定期的に実行するもの(cron)はPHPで処理しています。

## 実行内容
- おはようございます&お天気トゥート (毎朝6時30分)

## Installation

#### Require
- PHP
- crontab

```
git clone https://github.com/AkariBot/AkariBot-PHP.git
cd AkariBot-PHP
```
```
crontab -e

  30 6 * * * php /path/to/AkariBot-PHP/post/morning.php #おはトゥート 毎朝06:30
```
