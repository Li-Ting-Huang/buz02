<fieldset>
    <legend>目前位置 : 首頁 > 問卷調查</legend>
    <table style="width: 95%;">
        <tr>
            <th class="ct">編號</th>
            <th class="ct">問卷題目</th>
            <th class="ct">投票總數</th>
            <th class="ct">結果</th>
            <th class="ct">狀態</th>
        </tr>
        <?php
        $subjects=$Que->all('subject_id');
        foreach($subjects as $key => $subject){
   
        ?>
        <tr>
            <td><?=$key+1;?></td>
            <td><?=$subject['text'];?></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php
        }
        ?>
    </table>
</fieldset>