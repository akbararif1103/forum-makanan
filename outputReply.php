<?php
function displayReplies($konek, $reply_id) {
    $komen_data_reply = mysqli_query($konek, "SELECT k.*, u.username 
                                               FROM komentar k 
                                               LEFT JOIN user u ON k.user_id = u.id
                                               WHERE id_reply = $reply_id");
    
    if (mysqli_num_rows($komen_data_reply) > 0) {
        foreach ($komen_data_reply as $reply_row) {
            ?>
            <div class="reply-container ml-5">
                <span class="fw-semibold text-decoration-underline"><?= $reply_row["username"] ?></span>
                <span class="ml-3 fw-light"><?= date('d F Y H:i:s', strtotime($reply_row['tanggal'])) ?></span>
                <h6><?= $reply_row["isi_komen"] ?></h6>
                <button class="reply" onclick="reply(<?php echo $reply_row['id']; ?>, '<?=$reply_row['username']?>');">Reply</button>
                <?php
                // Recursive call for nested replies
                displayReplies($konek, $reply_row['id']);
                ?>
            </div>
            <?php
        }
    }
}
?>
