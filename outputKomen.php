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
            <div class="container-komen d-flex flex-col align-items-center">
                <!-- Trigger the modal with a button -->
                <button type="button" class="reply btn btn-primary" onclick="reply(<?php echo $komen_row['id']; ?>, '<?=$komen_row['username']?>');" data-toggle="modal" data-target="#myModal">Balas</button>
                <?php if ($_SESSION['id'] == $komen_row['user_id']) { ?>
                        <div class="col-2 w-100">
                            <a href="editKomen.php?idEditkomen=<?= $komen_row["id_komen"] ?>" class="col 4 text-decoration-underline">Edit</a>
                            |
                            <a href="hapusKomen.php?idHapuskomen=<?= $komen_row["id_komen"] ?>&idDiskusi=<?= $komen_row["diskusi_id"] ?>" class="col-4 text-decoration-underline">Hapus</a>
                        </div>
                    <?php } ?>
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Balas pendapat</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="komentar.php" method="post" class="d-flex flex-column mt-4">
                                    <h3 id="title">Leave A Comment</h3>
                                    <input type="hidden" name="reply_id" id="reply_id">
                                    <input type="text" name="diskusi_id" value="<?php echo $_GET['idDiskusi']; ?>" hidden>
                                    <textarea name="komentar" id="" cols="30" rows="10" placeholder="Ketik pendapatmu"></textarea>
                                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
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
