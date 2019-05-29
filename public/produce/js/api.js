var api = "http://caigou.pzhkj.cn"




function getUrlKey(name) {
    return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.href) || [, ""])[1].replace(/\+/g, '%20')) || null
}

// 信息提示框
function toast(msg) {
    var toastWrapper = '<div class="toast-tips">'+msg+'</div>';
    $('body').append(toastWrapper);
    setTimeout(function() {
        $('.toast-tips').fadeOut(1000);
        setTimeout(function(){
        $('.toast-tips').remove();            
        }, 1000);
    }, 500);
}
// 混入过滤器
Vue.mixin({
    filters:{
        filterImg(url) {
            return api+url;
        }
    }
});