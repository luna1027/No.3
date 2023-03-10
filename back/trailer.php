<h3 class="ct" style="background: #878787; color:#eee;margin:10px 0;">預告片清單</h3>
<div style="width: 100%;">
    <div style="display: flex; align-items:center; justify-content:center;text-align:center;">
        <div style="width: 25%; background:#ccc; margin:0 1px;">預告片海報</div>
        <div style="width: 25%; background:#ccc; margin:0 1px;">預告片片名</div>
        <div style="width: 25%; background:#ccc; margin:0 1px;">預告片排序</div>
        <div style="width: 25%; background:#ccc; margin:0 1px;">操作</div>
    </div>
    <form action="./api/edit_trailer.php" method="post">
        <div style="height: 210px; overflow:auto;">
            <?php
            $ts = $Trailer->all(" ORDER BY `rank` ");
            // prr($ts);
            foreach ($ts as $key => $t) {
                $prev = ($key == 0) ? $t['id'] : $ts[$key - 1]['id'];
                // echo $Trailer->count(1);
                $next = ($key == ($Trailer->count(1)) - 1) ? $t['id'] : $ts[$key + 1]['id'];
            ?>
                <div style="display: flex; align-items:center; justify-content:center;text-align:center;background:#fff;border:3px solid #eee;padding:3px;">
                    <div style="width: 25%; margin:0 1px; padding:2px;">
                        <img src="./upload/<?= $t['img']; ?>" style="width: 100px;">
                    </div>
                    <div style="width: 25%; margin:0 1px;">
                        <input type="text" name="name[]" value="<?= $t['name']; ?>">
                    </div>
                    <div style="width: 25%; margin:0 1px;">
                        <input type="button" value="往上" onclick="sw('trailer',<?= $t['id']; ?>,<?= $prev; ?>)">
                        <input type="button" value="往下" onclick="sw('trailer',<?= $t['id']; ?>,<?= $next; ?>)">
                    </div>
                    <div style="width: 25%; margin:0 1px;">
                        <input type="checkbox" name="sh[]" value="<?= $t['id']; ?>" <?= ($t['sh'] == 1) ? 'checked' : ''; ?>>顯示&nbsp;
                        <input type="checkbox" name="del[]" value="<?= $t['id']; ?>">刪除&nbsp;
                        <select name="ani[]" id="">
                            <option value="1" <?= ($t['ani'] == 1) ? 'selected' : ''; ?>>淡入淡出</option>
                            <option value="2" <?= ($t['ani'] == 2) ? 'selected' : ''; ?>>滑入滑出</option>
                            <option value="3" <?= ($t['ani'] == 3) ? 'selected' : ''; ?>>縮放</option>
                        </select>
                        <input type="hidden" name="id[]" value="<?= $t['id']; ?>">
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="ct">
            <input type="submit" value="編輯確定">
            <input type="reset" value="重製">
        </div>
    </form>
</div>

<hr>
<h3 class="ct">新增預告片海報</h3>
<form action="./api/add_trailer.php" method="post" enctype="multipart/form-data">
    <table style="display:flex;justify-content:space-around;">
        <tr>
            <td>預告片海報: <input type="file" name="img"></td>
            <td>預告片片名: <input type="text" name="name"></td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重製">
    </div>
</form>