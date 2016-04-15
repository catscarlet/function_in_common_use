/*
这个函数是为了解决微信ios版title不会变化的问题。PC和Android可以直接依靠document.title更改title，但微信ios版必须重载页面才会变更title。下面的代码会触发新建并删除一个iframe，这个动作会让微信重载title。
*/

/*
For WeChat on PC and Android, The title can be changed by using 'document.title', but it doesn't work on iOS because the Wechat sucks.
When you need to change the title, you need to reload the page instead.
Try to do like this. Load a iframe and remove it, and the Wechat is poked.
*/

function changeWechatWebviewTitle(newTitle) {
    var $body = $('body');
    document.title = newTitle;
    var $iframe = $('<iframe src="/favicon.ico"></iframe>');
    $iframe.on('load',function() {
        setTimeout(function() {
            $iframe.off('load').remove();
        }, 0);
    }).appendTo($body);
}
