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

    <!-- 新增會員-->
    <h1>會員註冊</h1>
    <div style="color:red ;">請設定您要註冊的帳號及密碼(最常12個字元)</div>
    
    <table>
        <tr>
            <td class="clo">STEP1 : 登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="clo">STEP2 : 登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="clo">STEP3 : 再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td class="clo">STEP4 : 信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>
                <button onclick="reg()">註冊</button>
                <button onclick="$('table input').val('')">清除</button>
            </td>
            <td></td>
        </tr>
    </table>
    <!-- 新增會員end-->
</fieldset>
<script>

    getUsers();//畫面載入時先顯示一次

// 新增會員 ->只改alert("註冊成功，歡迎加入")那邊重新載入
    function reg(){
    // 先集中在user的物件
    let user={
        acc:$("#acc").val(),
        pw:$("#pw").val(),
        pw2:$("#pw2").val(),
        email:$("#email").val()
    }
    //1.檢查空白
    if(user.acc==''|| user.pw==''||user.pw2==''||user.email==''){
        alert("不可空白")
    }else if(user.pw!=user.pw2){
        // 檢查密碼
        alert("密碼錯誤")
    }else{
         $.get("./api/chk_acc.php",{acc:user.acc},(res)=>{
            // console.log(res);
            if(parseInt(res)==1){
                alert("帳號重複")
            }else{
                $.post("./api/reg.php",user,()=>{
                //只改這裡
                    // alert("註冊成功，歡迎加入")
                    // location.href="?do=login"
        
                    getUsers();
                //只改這裡
                })
            }
         })
    }
   }
    // 新增會員end

    // 用AJAX顯示資料表user每筆資料
    function getUsers(){

        $.get("./api/users.php",(users)=>{
            $("#users").html(users)
        })
    }

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
            // $.get("./api/users.php",(users)=>{
            //     $("#users").html(users)
            // })
            getUsers();
           
        })
    }
</script>