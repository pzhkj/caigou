var xm = new Vue({
    el: "#app",
    data: {
        cOrderDetail: {}
    },
    methods: {
        getCorderDetail(id) {
            $.post(api + '/api/purchase/getOrderInfo', {
                order_id: id,
                token: sessionStorage.getItem('token')
            }, (data) => {
                this.cOrderDetail = data.data;
            }, 'json')
                .fail((err) => {
                    toast('服务器异常');
                });
        }
    },
    created() {
        this.getCorderDetail(getUrlKey('id'));

        
    },
});