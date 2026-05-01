# Xenon WMS 仓库管理系统

基于 ThinkPHP 5.0 开发的企业级仓库管理系统（进销存）。

## 在线演示

| 账号 | 密码 | 角色 |
|------|------|------|
| admin | admin | 普通用户 |
| bool | admin | 管理员 |

访问地址：http://148.70.120.105:8002/login/index

## 演示截图

<div align="center">    
  <img src="./demo/qq.png" width="400" alt="演示截图" />
</div>

## 技术栈

| 分类 | 技术 |
|------|------|
| 框架 | ThinkPHP 5.0 |
| 数据库 | MySQL |
| 前端 | HTML + jQuery + Ajax |
| Excel | PHPExcel |
| 队列 | think-queue |
| 图像 | think-image |

## 项目结构

```
wms/
├── app/                      # 应用目录
│   ├── controller/          # 控制器
│   ├── model/              # 模型
│   ├── service/            # 业务服务层
│   ├── validate/           # 验证器
│   └── view/               # 视图模板
├── extend/                  # 扩展类库
│   └── Classes/            # 第三方类库
│       └── PHPExcel/       # Excel 处理
├── demo/                    # 演示截图
├── public/                  # 公开资源
├── runtime/                 # 运行时目录
├── vendor/                  # Composer 依赖
├── thinkphp/               # ThinkPHP 框架
├── composer.json            # 依赖配置
└── README.md
```

## 功能模块

| 模块 | 说明 |
|------|------|
| 首页 | 仪表盘统计 |
| 基础资料 | 分类、计量单位、商品、品牌、供应商、客户、公司 |
| 仓库管理 | 仓库、库位、货架 |
| 库存管理 | 库存查询、库存预警 |
| 采购管理 | 采购订单、采购入库 |
| 销售管理 | 销售订单、销售出库 |
| 配货管理 | 配货单、打印、发货 |
| 订单管理 | 订单处理、导入导出 |
| 系统管理 | 用户、角色、菜单 |

## 核心控制器

| 控制器 | 说明 |
|--------|------|
| `Index` | 首页 |
| `Login` | 登录 |
| `Category` | 分类管理 |
| `Unit` | 计量单位 |
| `Product` | 商品管理 |
| `Brand` | 品牌管理 |
| `Supplier` | 供应商管理 |
| `Customer` | 客户管理 |
| `Company` | 公司管理 |
| `Storage` | 仓库管理 |
| `Location` | 库位管理 |
| `Shelve` | 货架管理 |
| `Instorage` | 入库管理 |
| `Outstorage` | 出库管理 |
| `Order` | 订单管理 |
| `Pack` | 配货管理 |
| `User` | 用户管理 |
| `Role` | 角色管理 |
| `Menu` | 菜单管理 |

## 快速开始

### 环境要求

- PHP >= 5.4.0
- MySQL >= 5.5
- Apache/Nginx
- Composer

### 安装步骤

1. 克隆项目
```bash
git clone https://github.com/chenbool/wms.git
```

2. 安装依赖
```bash
composer install
```

3. 配置数据库
修改 `app/database.php` 中的数据库连接信息

4. 导入数据库
创建数据库并导入 SQL 文件

5. 访问系统
```
http://localhost/
```

## 目录权限

| 目录 | 权限要求 |
|------|----------|
| runtime/ | 可写 |
| public/uploads/ | 可写 |

## 相关链接

- [ThinkPHP 官网](https://www.thinkphp.cn/)
- [ThinkPHP 5.0 文档](https://www.kancloud.cn/manual/thinkphp5/)

## 联系方式

- QQ群：785794314
- 支付宝：81001985@qq.com

## 许可证

Apache-2.0 License
