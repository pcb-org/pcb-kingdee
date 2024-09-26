# pcb-kingdee

pcb-kingdee 为 pcb 项目封装了金蝶单据查询、保存、提交、审核、下推等服务端 API。

## 安装

```shell
composer require "pcb-org/pcb-kingdee"
```

## 使用示例

```php
use PcbKingdee\Application;

$config = [
    'base_uri' => 'http://127.0.0.1',
    'app_id' => 'YOUR_APP_ID',
    'app_secret' => 'YOUR_APP_SECRET',
    'db_id' => 'YOUR_DB_ID',
];

$app = new Application($config);

$app->withUser($username)->makeSalesOrder()->findBillById($billId);
```
