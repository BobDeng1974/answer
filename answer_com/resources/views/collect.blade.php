<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="baidu-site-verification" content="QXVdEdBQhU">
    <link rel="canonical" href="http://mnks.jxedt.com/ckm1/sxlx/">
    <link rel="shortcut icon" type="image/x-icon" href="http://img.58cdn.com.cn/jxedt/logos/favicon.ico">
    <title>【驾校一点通官网】一点通驾校模拟考试_学车理论考试试题_驾驶员考试科目一</title>
    <link rel="shortcut icon" type="image/x-icon" href="http://img.58cdn.com.cn/jxedt/logos/favicon.ico">
    <meta name="mobile-agent" content="format=xhtml; url=http://m.jxedt.com/mnks/ckm1/sxlx/">
    <meta name="mobile-agent" content="format=html5; url=http://m.jxedt.com/mnks/ckm1/sxlx/">
    <meta name="mobile-agent" content="format=wml; url=http://m.jxedt.com/mnks/ckm1/sxlx/">
    <link href="./order/css/main.css" type="text/css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<style>
    .jieshi-box{
        color : rgb(178 157 119);
        margin-top : 10px;
        margin-left : 10px;
        margin-bottom : 10px;
        height:100px;
    }
    #ul_answers li img{
        width:23px;
    }
    .num-box-nick button{
        width:35px;
        margin-bottom : 10px;
    }
    .next-btn,.prev-btn{
        color: #fff;
        background: #44b83a;
        width:80px;
        height:40px;
    }
    .green {
        background-color:#7ED321;
    }
    .red {
        background-color:#DC143C;
    }
</style>

<body>
<div class="nav main">
    <a href="http://www.jxedt.com/">首页</a> &gt;
    <a href="http://mnks.jxedt.com/">模拟考试</a> &gt;
    <a href="http://mnks.jxedt.com/ckm1/">小车科目一</a> &gt;
    <a href="http://mnks.jxedt.com/ckm1/sxlx/">我的收藏</a>
</div>

<div class="btn-box-nick" style="width:1190px;height:40px ;margin:10px auto">
    <div class="lx main">
        <div class="main_title">收藏练习<span>车型：小车</span><span>科目：科目一</span><span></span></div>
        <div class="examone lx_box" id="main_M">
            <div class="" style="display: block;">单选题</div>
            <div class="box">
                {{--<div class="loading" id="wartingdiv" style="display: none;">--}}
                {{--<img src="./order/image/loading.gif">--}}
                {{--加载中……--}}
                {{--</div>--}}
                <div id="frm_main" style="display: block;">
                    <button class="btn-shoucang" ref="shoucang" style="margin-left:0px;"><img src="./image/xingxing.png" style="width:15px;">收藏</button>
                    <h1 class="title">
                        <span class="page-ipt-nick"></span>
                        <span id="index"></span>/
                        <span id="totalcount"></span>&nbsp
                        <span class="main-box-nick"></span>
                    </h1>

                    <div class="xuanxiang"></div>
                    <div class="lx_item">
                        <ul id="ul_answers" style="font-size:27px;"></ul>
                    </div>

                    <div class="btns">
                        <button class="next-btn" data-page="next">下一题</button>
                        <button class="prev-btn" data-page="prev">上一题</button>
                        <a href="javascript:void(0)" class="btn grey" id="btn_jieshi">显示本题解释</a>
                        <a href="javascript:void(0)" class="btn grey" id="btn_commit">显示本题讨论</a>
                        <a href="javascript:void(0)" class="btn grey" id="btn_datika">显示答题卡</a>
                    </div>
                    <div class="info">
                        <span><img src="./image/false.jpg" style="width:15px" onclick="checkGo(this)" id="checkgo"><label for="AutoNextTmp" title="正确答题后跳转到下一题">自动跳转至下一题</label></span>
                        <span>答对: <font id="TrueNum" style="color:green;">0</font> 题</span>
                        <span>答错: <font id="FalseNum" style="color:red;">0</font> 题</span>
                        <span>正确率：<font id="TruePre" data="1">0.00%</font></span>
                    </div>
                    <div class="num-box-nick" style="display: none;"></div>
                    <div class="jie-parent" style="display: none;">
                        <font style="font-size:25px;">试题详解</font>
                        <hr style="border:0.2px solid lightgray">
                        <div class="jieshi-box"></div>
                    </div>
                    <div class="comment_parent" style="display: none;">
                        <font style="font-size:25px;">我来分析</font>
                        <hr style="border:0.2px solid lightgray">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script>

    $(".btn-shoucang").click(function(){
        var collect = "";
        if( $(this).children('img').attr('src') == './image/xingxing.png' )
        {
            $(this).children('img').attr('src','./image/xing.gif');
            collect = "取消收藏";
        }else{
            $(this).children('img').attr('src','./image/xingxing.png');
            collect = "收藏";
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type : "post",
            url  : "collectAdd",
            data : {
                'collect' : collect,
                'exam_id' : $(".exam_id").val(),
            },
            success:function(data)
            {
                if(data['code'] > 0 )
                {
                    alert('出错了哦,请稍等!');

                } else {
                    location.href = 'collect';
                }
            }
        })
    });

    //评论
    $("#btn_commit").click(function(){
        if($('.comment_parent').css('display') == 'none')
        {
            $('.comment_parent').css('display','block');
        }else{
            $('.comment_parent').css('display','none');
        }
    });
    //解释
    $("#btn_jieshi").click(function(){
        if($('.jie-parent').eq(0).css('display') == 'none')
        {
            $('.jie-parent').eq(0).css('display','block');
        }else{
            $('.jie-parent').eq(0).css('display','none');
        }

    });
    //答题卡
    $("#btn_datika").click(function(){
        if($('.num-box-nick').css('display') == 'none')
        {
            $('.num-box-nick').css('display','block');
        }else{
            $('.num-box-nick').css('display','none');
        }

    });
    //自动跳转下一题
    function checkGo(obj) {
        if( $(obj).attr('src') == './image/false.jpg' )
        {
            $(obj).attr('src','./image/true.jpg');
        }else{
            $(obj).attr('src','./image/false.jpg');
        }
    }

    var exam_arr = {};
    //选项点击事件
    function showCss(obj) {
        var xuan = [];
        var success = "";
        var error = "";
        $("#ul_answers img").each(function(k,v){
            if($(v).attr('src') == "./image/true.jpg")
            {
                xuan.push('false');
            }else{
                xuan.push('true');
            }
        });

        if(xuan.indexOf('false') == -1)
        {
            obj.xuan = 2;
            var count_accuracy = Number($("#TruePre").attr('data'));
            var accuracy = '';
            $("#TruePre").attr('data', count_accuracy+1);
            if($(obj).parent('li').attr('class') == 'success')
            {
                success = $(obj).parent('li').attr('data-a-label');
                $(obj).attr('src','./image/true.jpg');
                var data_success = Number($("#TrueNum").text())+1;
                $("#TrueNum").text(data_success);
                accuracy = data_success/count_accuracy%100;
                $("#TruePre").text((accuracy*100).toFixed(2)+"%");
                $(".num-box-nick button").each(function(k,v){
                    if(Number($(v).text()) == Number($(".page-ipt-nick").eq(0).text()))
                    {
                        $(this).addClass('green');
                    }
                })

            }else{
                error = $(obj).parent('li').attr('data-a-label');
                var data_error = Number($("#FalseNum").text())+1;
                $("#FalseNum").text(data_error);
                $(obj).attr('src','./image/ffalse.jpg');
                var data_success = Number($("#TrueNum").text())
                accuracy = data_success/count_accuracy%100;
                $("#TruePre").text((accuracy*100).toFixed(2)+"%");
                $("#ul_answers li").each(function(k,v){
                    if($(v).attr('class') == 'success')
                    {
                        success = $(this).attr('data-a-label');
                        $(this).children('img').attr('src','./image/true.jpg');
                    }
                });
                $(".num-box-nick button").each(function(k,v){
                    if(Number($(v).text()) == Number($(".page-ipt-nick").eq(0).text()))
                    {
                        $(this).addClass('red');
                    }
                })
            }
            exam_arr[Number($(".page-ipt-nick").eq(0).text())] = Number($(".page-ipt-nick").eq(0).text())+success+error;
        }
    }



    //定义一个分页方法，可多次调用
    function paginationNick(opt){

        //参数设置
        var pager={
            paginationBox:'',//分页容器-- 必填
            mainBox:'',//内容盒子--必填
            numBtnBox:'',//数字按钮盒子-- 必填
            btnBox:'',//按钮盒子 --必填
            ipt:'',//input class-- 必填
            goBtn:'',//go btn class --必填
            currentBtn:'',//当前按钮class name --必填
            pageCount:1,//每页显示几条数据
            numBtnCount:100,//当前页左右两边各多少个数字按钮
            currentPage:0,//当前页码data-page，首屏默认值
            maxCount:0,//ajax请求数据分成的最大页码
            data:[]//ajax请求的数据
        };
        pager = $.extend(pager,opt);//用于合并对象
        var flag = true;//用于判断是否调用存储答题卡函数

        //请求数据页面跳转方法
        function goPage(btn){
            //obj为ajax请求数据
            var scoreObject = eval('{{$data}}'.replace(/&quot;/g,'"'));//将json转成js对象
            var obj={other:{},value:scoreObject};

            //将展示的数据赋值给pager.data  (array)
            pager.data=obj.value;
            //设置ajax请求数据分成的最大页码
            pager.maxCount=pager.data.length % pager.pageCount ? parseInt(pager.data.length / pager.pageCount) +1 :
                pager.data.length / pager.pageCount;
            //设置当前页码
            if(!isNaN(btn)){//数字按钮
                pager.currentPage=parseInt(btn);
            }else{
                switch(btn){
                    case 'first':
                        pager.currentPage=0;
                        break;
                    case 'prev':
                        if(pager.currentPage>0){
                            --pager.currentPage;
                        }
                        break;
                    case 'next':
                        if(pager.currentPage+1<pager.maxCount){
                            ++pager.currentPage;
                        }
                        break;
                    case 'last':
                        pager.currentPage=pager.maxCount-1;
                        break;
                }
            }
            if(flag)
            {
                //创建数字按钮
                createNumBtn(pager.currentPage);
                flag = false;
            }else{
                getNumBtn(pager.currentPage);
            }
            //赋值给页码跳转输入框的value，表示当前页码
            $('.'+pager.btnBox).val(pager.currentPage+1);//最大div
            $(' .'+pager.ipt).text(pager.currentPage+1); //显示当前页码
            $("#totalcount").text(pager.maxCount);//显示总页码
            //内容区填充数据
            var arr=[],str='',xuanxiang='';
            arr=pager.data.slice(pager.pageCount*pager.currentPage,
                pager.data.length - pager.pageCount*(pager.currentPage+1) > -1 ?
                    pager.pageCount*(pager.currentPage+1) : pager.data.length);
            var exam_correct = "";//正确答案
            var explain = "";
            arr.forEach(function(v){
                str+='<span>'+v.title+'</span>';
                exam_correct = v.exam_correct;
                explain = v.explain;
                xuanxiang += '<li data-a-label="A" class=""><img src="./image/false.jpg" onclick="showCss(this)"> &nbsp;A、'+v.option_a+'</a></li>\n';
                xuanxiang += '<li data-a-label="B"><img src="./image/false.jpg" onclick="showCss(this)"> &nbsp;B、'+v.option_b+'</li>\n';
                xuanxiang += '<li data-a-label="C"><img src="./image/false.jpg" onclick="showCss(this)"> &nbsp;C、'+v.option_c+'</li>\n';
                xuanxiang += '<li data-a-label="D"><img src="./image/false.jpg" onclick="showCss(this)"> &nbsp;D、'+v.option_d+'</li>';
                xuanxiang += '<input type="hidden" class="exam_id" value="'+v.exam_id+'">';
            });
            $(".jieshi-box").html(explain);//解释内容
            $("#ul_answers").html(xuanxiang);//展示选项
            $('.'+pager.mainBox).html(str);

            $("#ul_answers").children('li').each(function(k,v){
                if($(v).attr('data-a-label')==exam_correct) $(this).attr('class','success');//正确值得默认classname
                if($(v).text().length <= 2 )$(this).hide();//当选项里面没有内容不展示
            });

            for(var r in exam_arr)
            {
                if(pager.currentPage+1 == exam_arr[r].slice(0,1))
                {
                    if(exam_arr[r].length == 2)
                    {
                        $("#ul_answers li").each(function(k,v){
                            if($(v).hasClass('success'))
                            {
                                $(this).children('img').attr('src','./image/true.jpg');
                            }
                        })
                    }else if(exam_arr[r].length == 3)
                    {
                        $("#ul_answers li").each(function(k,v){
                            if($(v).hasClass('success'))
                            {
                                $(this).children('img').attr('src','./image/true.jpg');
                            }
                            if($(v).attr('data-a-label') == exam_arr[r].slice(2,3))
                            {
                                $(this).children('img').attr('src','./image/ffalse.jpg');
                            }
                        })
                    }
                }
            }
        }

        //创建非数字按钮和数据内容区
        function createOtherBtn(){
            //ipt value变化并赋值给go btn data-page
            $('.'+pager.btnBox+' .'+pager.ipt).change(function(){
                if(!isNaN($(this).val())){//是数字
                    if($(this).val() > pager.maxCount){//限制value最大值，跳转尾页
                        $(this).val(pager.maxCount);
                    }
                    if($(this).val()<1){//限制value最小值，跳转首页
                        $(this).val(1);
                    }
                }else{//非数字清空value
                    $(this).val('');
                }
                $('.'+pager.btnBox+' .'+pager.goBtn).attr('data-page',$(this).val() ? $(this).val()-1 : '');
            });
            //每个btn绑定请求数据页面跳转方法
            $('.'+pager.btnBox+' button').each(function(i,v){
                $(this).click(function(){
                    //有值且不是上一次的页码时才调用
                    if(v.getAttribute('data-page') && v.getAttribute('data-page') != pager.currentPage){
                        goPage(v.getAttribute('data-page'));
                    }
                });
            });
        }

        //创建数字按钮
        function createNumBtn(page){
            //page是页面index从0开始，这里的page加减一要注意
            var str='';
            if(pager.maxCount>pager.numBtnCount*2){//若最大页码数大于等于固定数字按钮总数（pager.numBtnCount*2+1）时
                //此页左边右边各pager.numBtnCount个数字按钮
                if(page-pager.numBtnCount>-1){//此页左边有pager.numBtnCount页 page页码从0开始
                    for(var m=pager.numBtnCount;m>0;m--){
                        str+='<button data-page="'+(page-m)+'">'+(page-m+1)+'</button>';
                    }
                }else{
                    for(var k=0;k<page;k++){
                        str+='<button data-page="'+k+'">'+(k+1)+'</button>';
                    }
                }
                str+='<button data-page="'+page+'" class="'+pager.currentBtn+'" disabled="disabled">'+(page+1)+'</button>';//此页
                if(pager.maxCount-page>3){//此页右边有pager.numBtnCount页 page页码从0开始
                    for(var j=1;j<pager.numBtnCount+1;j++){
                        str+='<button data-page="'+(page+j)+'">'+(page+j+1)+'</button>';
                    }
                }else{
                    for(var i=page+1;i<pager.maxCount;i++){
                        str+='<button data-page="'+i+'">'+(i+1)+'</button>';
                    }
                }
                /*数字按钮总数小于固定的数字按钮总数pager.numBtnCount*2+1时，
                这个分支，可以省略*/
                if(str.match(/<\/button>/ig).length<pager.numBtnCount*2+1){
                    str='';
                    if(page<pager.numBtnCount){//此页左边页码少于固定按钮数时
                        for(var n=0;n<page;n++){//此页左边
                            str+='<button data-page="'+n+'">'+(n+1)+'</button>';
                        }
                        str+='<button data-page="'+page+'" class="'+pager.currentBtn+'" disabled="disabled">'+(page+1)+'</button>';//此页
                        for(var x=1;x<pager.numBtnCount*2+1-page;x++){//此页右边
                            str+='<button data-page="'+(page+x)+'">'+(page+x+1)+'</button>';
                        }
                    }
                    if(pager.maxCount-page-1<pager.numBtnCount){
                        for(var y=pager.numBtnCount*2-(pager.maxCount-page-1);y>0;y--){//此页左边
                            str+='<button data-page="'+(page-y)+'">'+(page-y+1)+'</button>';
                        }
                        str+='<button data-page="'+page+'" class="'+pager.currentBtn+'" disabled="disabled">'+(page+1)+'</button>';//此页
                        for(var z=page+1;z<pager.maxCount;z++){//此页右边
                            str+='<button data-page="'+z+'">'+(z+1)+'</button>';
                        }
                    }
                }
            }else{
                str='';
                for(var n=0;n<page;n++){//此页左边
                    str+='<button data-page="'+n+'">'+(n+1)+'</button>';
                }
                str+='<button data-page="'+page+'" class="'+pager.currentBtn+'" disabled="disabled">'+(page+1)+'</button>';//此页
                for(var x=1;x<pager.maxCount-page;x++){//此页右边
                    str+='<button data-page="'+(page+x)+'">'+(page+x+1)+'</button>';
                }
            }
            $('.'+pager.numBtnBox).html(str);

            //每个btn绑定请求数据页面跳转方法
            $('.'+pager.numBtnBox+' button').each(function(i,v){
                $(this).click(function(){
                    goPage(v.getAttribute('data-page'));
                });
            });
            //按钮禁用
            /*$('.'+pager.btnBox+' button').not('.'+pager.currentBtn).attr('disabled',false);
            if(!page){//首页时
                $('.'+pager.btnBox+' .first-btn').attr('disabled',true);
                $('.'+pager.btnBox+' .prev-btn').attr('disabled','disabled');
            }
            if(page==pager.maxCount-1){//尾页时
                $('.'+pager.btnBox+' .last-btn').attr('disabled',true);
                $('.'+pager.btnBox+' .next-btn').attr('disabled',true);
            }*/
        }


        function getNumBtn(page) {
            $(".num-box-nick button").each(function(k,v){
                if($(v).attr('disabled') == 'disabled')
                {
                    $(this).removeAttr('disabled');
                }
                if(Number($(v).text()) == page+1)
                {
                    $(this).attr('disabled','disabled');
                }
            })
        }

        //首屏加载
        createOtherBtn();//首屏加载一次非数字按钮即可
        goPage();//请求数据页面跳转满足条件按钮点击都执行，首屏默认跳转到currentPage

    }
    //调用
    paginationNick({
        paginationBox:'box-nick',//分页容器--必填
        mainBox:'main-box-nick',//内容盒子--必填
        numBtnBox:'num-box-nick',//数字按钮盒子-- 必填
        btnBox:'btn-box-nick',//按钮盒子 --必填
        ipt:'page-ipt-nick',//input class-- 必填
        goBtn:'go-btn-nick',//go btn class --必填
        currentBtn:'active-nick'//当前按钮class name --必填
    });
</script>