<fieldset>
    <legend>忘記密碼</legend>
    <div>請輸入信箱一查詢密碼</div>
    <div><input type="text" name="email" id="email"></div>
    <div id="result"></div>
    <div><button onclick="findPw()">尋找</button></div>
</fieldset>
<script>
    function findPw(){
        $.get("./api/find_pw.php",{email:$("#email").val()},(result)=>{
            $("#result").html(result)
        })
    }

    // 1.點擊->2.執行findPw()->3.串ajax->4.將email得值傳到api/find.php->回傳結果->顯示在HTML
</script>