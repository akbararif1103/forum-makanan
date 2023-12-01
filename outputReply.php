<?php
function displayReplies($konek, $reply_id)
{
    $komen_data_reply = mysqli_query($konek, "SELECT k.*, u.username, k.id AS id_komen 
                                               FROM komentar k 
                                               LEFT JOIN user u ON k.user_id = u.id
                                               WHERE id_reply = $reply_id");

    if (mysqli_num_rows($komen_data_reply) > 0) {
        foreach ($komen_data_reply as $reply_row) {
?>
            <div class="reply-container pt-4 pl-5 border border-top-0 border-end-0 border-bottom-0 border-primary">
                <span class="fw-semibold text-decoration-underline"><?= $reply_row["username"] ?></span>
                <span class="ml-3 fw-light"><?= date('d F Y H:i:s', strtotime($reply_row['tanggal'])) ?></span>
                <h6><?= $reply_row["isi_komen"] ?></h6>
                <div class="container-komen d-flex flex-col align-items-center">
                    <!-- Trigger the modal with a button -->
                    <button type="button" class="reply btn btn-primary" onclick="reply(<?php echo $reply_row['id']; ?>, '<?= $reply_row['username'] ?>');" data-toggle="modal" data-target="#myModal">Balas</button>
                    <?php if ($_SESSION['id'] == $reply_row['user_id']) { ?>
                        <div class="col-2 w-100">
                            <a href="editKomen.php?idEditkomen=<?= $reply_row["id_komen"] ?>" class="col 4 text-decoration-underline">Edit</a>
                            |
                            <a href="hapusKomen.php?idHapuskomen=<?= $reply_row["id_komen"] ?>&idDiskusi=<?= $reply_row["diskusi_id"] ?>" class="col-4 text-decoration-underline">Hapus</a>
                        </div>
                    <?php } ?>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Balas Komentar</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form action="komentar.php" method="post" class="d-flex flex-column mt-4">
                                        <h3 id="title">Leave A Comment</h3>
                                        <input type="hidden" name="reply_id" id="reply_id">
                                        <input type="text" name="diskusi_id" value="<?php echo $_GET['idDiskusi']; ?>" hidden>
                                        <textarea name="komentar" id="" cols="30" rows="10" placeholder="Ketik pendapat"></textarea>
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
                // Recursive call for nested replies
                displayReplies($konek, $reply_row['id']);
                ?>
            </div>
<?php
        }
    }
}
?>