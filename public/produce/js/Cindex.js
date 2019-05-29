var xm = new Vue({
    el: "#app",
    data: {
        show: false,
        procureList: [],
    },
    methods: {
        addProduce() {
            window.location.href = "Cbuyer.html"
        },
        produceDetail(id) {
            window.location.href = "CorderDetail.html?id="+id;
        },
        getMyList() {
            $.post(api+'/api/purchase/getOrder',{token:sessionStorage.getItem('token')},(data) => {
                this.procureList = data.data;
            },'json');
        }
    },
    created() {
        this.getMyList();
    },
});