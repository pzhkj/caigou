define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'order/index' + location.search,
                    add_url: 'order/add',
                    edit_url: 'order/edit',
                    del_url: 'order/del',
                    multi_url: 'order/multi',
                    table: 'order',
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
                        {field: 'product_name', title: __('Product_name')},
                        {field: 'qty', title: __('Qty')},
                        {field: 'order_sn', title: __('Order_sn')},
                        {field: 'status', title: __('Status'), searchList: {"2":__('已入库'),"1":__('未入库')}, formatter: Table.api.formatter.status},
                        {field: 'create_at', title: __('Create_at'), operate:'RANGE', addclass:'datetimerange'},
                        {field: 'remarks', title: __('Remarks')},
                        {field: 'delivery_at', title: __('Delivery_at'), operate:'RANGE', addclass:'datetimerange'},
                        {field: 'account.nickname', title: __('Account.nickname')},
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