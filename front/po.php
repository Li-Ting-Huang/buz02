<div>目前位置 : 首頁 > 分類網誌 > <span id="header"></span></div>
<div style="display: flex;">
<fieldset>
    <legend>分類網誌</legend>
    <div class="type">健康新知</div>
    <div class="type">菸害防制</div>
    <div class="type">癌症防治</div>
    <div class="type">慢性病防治</div>
</fieldset>
<fieldset>
    <legend>文章列表</legend>
    <div></div>
</fieldset>
</div>

<script>
    $(".type").on("click",function(){
        let type=$(this).text()
        $("#header").text(type)
    })
</script>