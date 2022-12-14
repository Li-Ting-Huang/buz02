<style>
    .type{
        cursor: pointer;
        color: blue;
        margin: 1rem 0;
        max-width: max-content;

    }
    .type:hover{
        border-bottom: 1px solid blue;
    }
</style>

<div>目前位置 : 首頁 > 分類網誌 > <span id="header"></span></div>
<div style="display: flex;">
<fieldset style="width:20%">
    <legend>分類網誌</legend>
    <div class="type">健康新知</div>
    <div class="type">菸害防制</div>
    <div class="type">癌症防治</div>
    <div class="type">慢性病防治</div>
</fieldset>
<fieldset style="width:80%">
    <legend>文章列表</legend>
    <div id="content"></div>
</fieldset>
</div>

<script>
    // 3.預設
    getList('健康新知');
    //1.點擊換標題
    $(".type").on("click",function(){
        let type=$(this).text()
        $("#header").text(type)
        
        //2.拿到列表
        getList(type);
    })
    // 2.
    function getList(type){
        $.get("./api/get_list.php",{type},(list)=>{
            $("#content").html(list)
        })
    }
    // 複製getList(type)改
    function getNews(id){
        $.get("./api/get_news.php",{id},(news)=>{
            $("#content").html(news)
        })
    }

</script>