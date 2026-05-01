# 布局文件使用说明

## 1. 列表页布局 (layout/list.html)

适用于带有搜索、表格、分页的列表页面。

### 可用区块

| 区块名称 | 说明 | 默认值 |
|---------|------|--------|
| `title` | 页面标题 | 继承 base |
| `style` | 自定义样式 | 空 |
| `breadcrumb_items` | 自定义面包屑 | 默认两级 |
| `breadcrumb_parent` | 面包屑父级名称 | "基本设置" |
| `page_title` | 当前页面名称 | "列表" |
| `toolbar_buttons` | 工具栏按钮 | 添加按钮 |
| `extra_buttons` | 额外按钮 | 导出按钮 |
| `search_area` | 搜索区域 | 默认带搜索表单 |
| `search_fields` | 搜索字段 | 空 |
| `table_content` | 表格内容 | 空 |
| `pagination` | 分页 | 空 |
| `modal_area` | 模态框 | 空 |
| `script` | 自定义脚本 | 空 |

### 使用示例

```html
{extend name="layout/list" /}

{block name="title"}员工管理 - {__block__}{/block}

{block name="breadcrumb_parent"}基本设置{/block}
{block name="page_title"}员工管理{/block}

{block name="search_fields"}
<span>
    <label class="control-label">员工名称</label>
    <input type="text" class="form-control" placeholder="员工名称" name="truename" value="{$Request.get.truename}">
</span>
<span style="margin-left: 15px;">
    <label class="control-label">员工编号</label>
    <input type="text" class="form-control" placeholder="员工编号" name="sn" value="{$Request.get.sn}">
</span>
{/block}

{block name="table_content"}
<table class="table table-bordered table-striped" id="example-2">
    <!-- 表格内容 -->
</table>
{/block}

{block name="script"}
<!-- 自定义脚本 -->
{/block}
```

---

## 2. 表单页布局 (layout/form.html)

适用于新增/编辑表单页面。

### 可用区块

| 区块名称 | 说明 | 默认值 |
|---------|------|--------|
| `title` | 页面标题 | 继承 base |
| `style` | 自定义样式 | 空 |
| `breadcrumb_items` | 自定义面包屑 | 默认两级 |
| `list_url` | 返回列表的URL | 空 |
| `breadcrumb_parent` | 面包屑父级名称 | "基本设置" |
| `page_title` | 当前页面名称 | "表单" |
| `panel_title` | 面板标题 | "编辑" |
| `form_content` | 表单内容 | 空 |
| `form_footer` | 表单底部按钮 | 保存+返回 |
| `script` | 自定义脚本 | 空 |

### 使用示例

```html
{extend name="layout/form" /}

{block name="title"}添加员工 - {__block__}{/block}

{block name="list_url"}{:url('User/index')}{/block}
{block name="breadcrumb_parent"}员工管理{/block}
{block name="page_title"}添加员工{/block}
{block name="panel_title"}添加员工{/block}

{block name="form_content"}
<form class="validate add-form" novalidate="novalidate">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">员工编号</label>
                <input type="text" class="form-control" name="sn" placeholder="员工编号">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">员工姓名</label>
                <input type="text" class="form-control" name="truename" placeholder="员工姓名">
            </div>
        </div>
    </div>
</form>
{/block}

{block name="script"}
<script>
function submitForm() {
    // 提交表单逻辑
}
</script>
{/block}
```

---

## 3. 迁移指南

### 原列表页结构
```html
{extend name="base"}
{block name="content"}
<!-- 完整的页面内容：面包屑、搜索、表格、分页、模态框 -->
{/block}
{block name="script"}
<!-- 脚本 -->
{/block}
```

### 新列表页结构
```html
{extend name="layout/list" /}
{block name="page_title"}页面标题{/block}
{block name="search_fields"}<!-- 搜索字段 -->{/block}
{block name="table_content"}<!-- 表格内容 -->{/block}
{block name="modal_area"}<!-- 模态框 -->{/block}
{block name="script"}<!-- 脚本 -->{/block}
```

### 原表单页结构
```html
{extend name="base"}
{block name="content"}
<!-- 完整的页面内容：面包屑、表单 -->
{/block}
{block name="script"}
<!-- 脚本 -->
{/block}
```

### 新表单页结构
```html
{extend name="layout/form" /}
{block name="list_url"}{:url('Controller/index')}{/block}
{block name="breadcrumb_parent"}父级菜单{/block}
{block name="page_title"}页面标题{/block}
{block name="form_content"}<!-- 表单内容 -->{/block}
{block name="script"}<!-- 脚本 -->{/block}
```

---

## 4. 优势

- **减少重复代码**：提取了面包屑、搜索区域、表格面板等公共结构
- **统一页面风格**：所有列表页和表单页保持一致的风格
- **便于维护**：修改公共布局只需修改一处
- **提高开发效率**：新页面只需填充内容区块即可
- **清晰的结构**：通过区块名称明确各部分职责

---

## 5. 文件结构

```
app/view/
├── base.html              # 基础布局（已存在）
├── layout.html            # 简单布局（已存在）
├── layout/                # 公共布局目录（新增）
│   ├── list.html          # 列表页布局
│   ├── form.html          # 表单页布局
│   └── README.md          # 使用说明
├── public/                # 公共组件
│   ├── header.html
│   ├── footer.html
│   ├── menu.html
│   └── menu_base.html
└── [模块]/                # 各模块视图
    ├── index.html
    ├── create.html
    └── edit.html
```
