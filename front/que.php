<fieldset>
    <legend>目前位置 : 首頁 > 問卷調查</legend>
    <table style="width: 95%;margin:auto">
        <tr>
            <th class="ct">編號</th>
            <th class="ct">問卷題目</th>
            <th class="ct">投票總數</th>
            <th class="ct">結果</th>
            <th class="ct">狀態</th>
        </tr>
        <?php
        // subject_id選項
        $subjects=$Que->all(['subject_id'=>0]);
        foreach($subjects as $key => $subject){
   
        ?>
        <tr>
            <td class="ct"><?=$key+1;?></td>
            <!-- $subject['text']題目 -->
            <td class="ct"><?=$subject['text'];?></td>
            <td class="ct"><?=$subject['count'];?></td>
            <td class="ct">
                <a href="?do=result&id=<?=$subject['id'];?>">結果</a>
            </td>
            <td class="ct">
                <?php
                    if(!isset($_SESSION['user'])){
                        echo "請先登入";
                    }else{
                        echo "<a href='?do=vote&id={$subject['id']}'>參與投票</a>";
                    }
                ?>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</fieldset>