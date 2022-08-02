<fieldset>
    <legend>帳號管理</legend>
    <table>
        <tr>
            <td class="clo">帳號</td>
            <td class="clo">密碼</td>
            <td class="clo">刪除</td>
        </tr>
        <tbody id="users">

        </tbody>
    </table>
    <div class="ct">
        <button onclick="del()">確定刪除</button>
        <button onclick="$('table input').prop('checked',false)">清空選取</button>
        <!-- "$('table input').prop('checked',false)"因為checkbox不是值所以用().prop('checked',false) -->
    </div>
</fieldset>
<script>
    // 用AJAX顯示資料表user每筆資料
    $.get("./api/users.php",(users)=>{
        $("#users").html(users)
    })

    function del(){
        // 純前端作法
        let ids=new Array();
        // 先宣告一個陣列的物件
        $("table input[type='checkbox']:checked").each((idx,box)=>{
            ids.push($(box).val())
        })
        // 1.console.log($("table input[type='checkbox']:checked"));為物件

        // 2.透過ids.push($(box).val())將每一筆物件轉為陣列

        // console.log(ids);為陣列
        $.post("./api/del_user.php",{del:ids},()=>{
            // {del:ids}為陣列

            // 刪除完後，回傳->重新顯示全部的值
            $.get("./api/users.php",(users)=>{
                $("#users").html(users)
            })
           
        })
    }
</script>