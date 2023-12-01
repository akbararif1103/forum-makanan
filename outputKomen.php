<?php
// Include the file containing the displayReplies function
require_once 'outputReply.php';

if (!empty($komen_row["isi_komen"])) {
    $current_comment = $komen_row["isi_komen"];
    if ($current_comment != $previous_comment) {
        ?>
        <div class="comment-container">
            <span class="fw-semibold text-decoration-underline"><?= $komen_row["username"] ?></span>
            <span class="ml-3 fw-light"><?= date('d F Y H:i:s', strtotime($komen_row['tanggal'])) ?></span>
            <h6><?= $komen_row["isi_komen"] ?></h6>
            <button class="reply" onclick="reply(<?php echo $komen_row['id']; ?>, '<?=$komen_row['username']?>');">Reply</button>
            <?php
            // Fetch and display replies separately
            displayReplies($konek, $komen_row['id']);
            ?>
        </div>
        <div class="line"></div>
        <?php
        $previous_comment = $current_comment;
    }
}
?>
