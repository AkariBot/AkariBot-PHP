# AkariBot-PHP
AkariBotでは定期的に実行するもの(cron)はPHPで処理しています。

## 実行内容
- おはようございます&お天気トゥート (毎朝6時30分)
- 週明けの統計トゥート (毎週月曜日0時05分)

## Installation

#### Require
- PHP
- crontab

```
git clone https://github.com/BotGirls/AkariBot-PHP.git
cd AkariBot-PHP
cp config.sample.php config.php
```
```
crontab -e

  30 6 * * * php /path/to/AkariBot-PHP/morning.php #おはトゥート 毎朝06:30
  5 0 * * 1 php /path/to/AkariBot-PHP/weekly_activities.php #統計トゥート 毎週月曜日00:05
```
