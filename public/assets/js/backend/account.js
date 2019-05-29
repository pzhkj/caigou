define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'account/index' + location.search,
                    add_url: 'account/add',
                    edit_url: 'account/edit',
                    del_url: 'account/del',
                    multi_url: 'account/multi',
                    table: 'account',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'login_name', title: __('Login_name')},
                        {field: 'login_password', title: __('Login_password')},
                        {field: 'nickname', title: __('Nickname')},
                        {field: 'phone', title: __('Phone')},
                        {field: 'remarks', title: __('Remarks')},
                        {field: 'type', title: __('Type'), searchList: {"3":__('客服账户'),"2":__('库存账户'),"1":__('采购账户')}, formatter: Table.api.formatter.normal},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});