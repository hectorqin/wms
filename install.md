# WMS 系统安装指南

## 环境要求

| 项目 | 要求 |
|------|------|
| PHP 版本 | >= 8.0.0 |
| MySQL 版本 | >= 5.7 (推荐 8.0) |
| Web 服务器 | Apache / Nginx |
| 扩展要求 | mysqli, pdo, json, mbstring |

## 安装步骤

### 方式一：在线安装向导

1. 访问安装界面
   
   在浏览器中访问：`http://your-domain/install.php`

2. 填写数据库信息
   
   | 字段 | 说明 | 默认值 |
   |------|------|--------|
   | 数据库主机 | MySQL 服务器地址 | localhost |
   | 数据库用户名 | MySQL 用户名 | root |
   | 数据库密码 | MySQL 密码 | - |
   | 数据库名称 | 数据库名称 | wms_db |

3. 点击「立即安装」按钮

安装程序会自动完成以下操作：
- 连接数据库服务器
- 创建数据库（如不存在）
- 导入 SQL 数据表结构
- 写入数据库配置文件
- 创建安装锁定文件

### 方式二：手动安装

1. **创建数据库**

   ```sql
   CREATE DATABASE wms_db DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
   ```

2. **导入数据**

   执行 `wms.sql` 文件，创建数据表和初始数据

3. **配置数据库连接**

   编辑 `app/database.php`：

   ```php
   <?php
   return [
       'type' => 'mysql',
       'hostname' => 'localhost',
       'database' => 'wms_db',
       'username' => 'root',
       'password' => 'your_password',
       'hostport' => '3306',
       'charset' => 'utf8mb4',
       'prefix' => 'w_',
       'debug' => true,
   ];
   ```

### 安全设置

安装完成后，请执行以下操作：

1. **删除安装文件**
   
   ```bash
   rm public/install.php
   ```

2. **修改默认密码**
   
   首次登录后请立即修改管理员密码

### 目录权限

确保以下目录可写：

| 目录 | 说明 |
|------|------|
| app/ | 应用配置目录 |
| runtime/ | 运行时缓存目录 |
| public/uploads/ | 上传文件目录 |

## 默认登录账号

| 类型 | 用户名 | 密码 |
|------|--------|------|
| 管理员 | admin | admin123 |

## 常见问题

### 连接数据库失败

- 检查 MySQL 服务是否启动
- 确认用户名和密码正确
- 检查防火墙是否允许 3306 端口

### 页面空白

- 检查 PHP 版本是否 >= 8.0
- 查看 `runtime/log` 目录下的错误日志
- 确保 runtime 目录可写

### SQL 导入失败

- 手动执行 `wms.sql` 导入
- 检查数据库字符集是否为 `utf8mb4`

### 提示已安装

- 删除 `app/install.lock` 文件后可重新安装

## 访问系统

安装完成后，访问：`http://your-domain/index.php`

或：`http://your-domain/login/index` 直接进入登录页面

## 技术支持

- QQ 群：785794314
- 在线演示：http://148.70.120.105:8002/login/index
