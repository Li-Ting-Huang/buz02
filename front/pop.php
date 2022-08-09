<fieldset>
    <legend>目前位置 : 首頁 > 人氣文章區</legend>
    <table id="pop">
        <tr>
            <td width="30%">標題</td>
            <td width="50%">內容</td>
            <td width="20%">人氣</td>
        </tr>
        <?php
        $all = $News->math('count', 'id', ['sh' => 1]);
        $div = 5;
        $pages = ceil($all / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;

        // $rows = $News->all(['sh' => 1], " limit $start,$div");
        // 加 order by good desc "
        $rows = $News->all(['sh' => 1], " order by good desc limit $start,$div");

        foreach ($rows as $row) {
        ?>
            <tr>
                <td class="title clo" style="cursor: pointer;"><?= $row['title']; ?></td>
                <!-- 加td class="pop" -->
                <td class="pop">
                    <!-- 改span因為切換要有DOM -->
                    <span class="summary"><?= mb_substr($row['text'], 0, 20); ?>...</span>
                    <!-- 改 -->
                    <div class="modal">
                    <!-- <span class="full" style="display:none ;"> -->
                        <?=nl2br($row['text']);?>
                    <!-- </span> -->
                    </div>
                </td>
                <!-- mb_substr取的部分字串 -->
                <td></td>
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
    // 1
    // $(".title").hover(
    //     function (){
    //         $(this).next().children('.modal').show();
    //     },
    //     function (){
    //         $(this).next().children('.modal').hide();
    //     }
    //     )

    // 2
    // $(".pop").hover(
    //     function (){
    //         $(this).children('.modal').show();
    //     },
    //     function (){
    //         $(this).children('.modal').hide();
    //     }
    //     )

    //1+2 上面合併下面

    $('.title,.pop').hover(
        function(){
            $(this).parent().find('.modal').show()
        },
        function(){
            $(this).parent().find('.modal').hide()
        }
    )
</script>