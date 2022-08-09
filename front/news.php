<fieldset>
    <legend>目前位置 : 首頁 > 最新文章區</legend>
    <!-- 改id="pop" -->
    <table id="pop">
        <tr>
            <td width="30%">標題</td>
            <td width="50%">內容</td>
            <td width="20%"></td>
        </tr>
        <?php
        $all = $News->math('count', 'id', ['sh' => 1]);
        $div = 5;
        $pages = ceil($all / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;

        $rows = $News->all(['sh' => 1], " limit $start,$div");

        foreach ($rows as $row) {
        ?>
            <tr>
                <td class="title clo" style="cursor: pointer;"><?= $row['title']; ?></td>
                <td>
                    <span class="summary"><?= mb_substr($row['text'], 0, 20); ?>...</span>
                    <span class="full" style="display:none ;">
                        <?=nl2br($row['text']);?>
                    </span>
                </td>
                <!-- mb_substr取的部分字串 -->
                <td>
                    <?php
                    // <!-- //複製pop.php -->
                        if(isset($_SESSION['user'])){
                            
                            echo "<a class='great' href='#' data-id='{$row['id']}'>讚</a>";
                        }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

    <div>
        <?php
        if (($now - 1) > 0) {
            $p = $now - 1;
            echo "<a href='?do=news&p={$p}'> < </a>";
        }

        for ($i = 1; $i <= $pages; $i++) {
            $fontsize = ($now == $i) ? '24px' : '18px';
            echo "<a href='?do=news&p={$i}' style='font-size:{$fontsize}'> $i </a>";
        }
        if (($now + 1) <= $pages) { //<=等於也要寫
            $p = $now + 1;
            echo "<a href='?do=news&p={$p}'> > </a>";
        }
        ?>
    </div>

</fieldset>
<script>
    $('.title').on('click',function(){
        $(this).next().children().toggle()
    })
</script>